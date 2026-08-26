<?php

namespace App\Http\Controllers;

use App\Models\ScanHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnalyzeController extends Controller
{
    public function analyze(Request $request)
    {
        try {

            // =====================================================
            // VALIDASI
            // =====================================================

            $request->validate([
                'image' => 'required|string'
            ]);

            // =====================================================
            // API KEY
            // =====================================================

            $apiKey = env('GEMINI_API_KEY');

            if (!$apiKey) {

                return response()->json([
                    'success' => false,
                    'message' => 'GEMINI_API_KEY belum ditemukan.'
                ], 500);

            }

            // =====================================================
            // DECODE BASE64
            // =====================================================

            $base64 = preg_replace(
                '/^data:image\/\w+;base64,/',
                '',
                $request->image
            );

            $imageData = base64_decode($base64);

            if (!$imageData) {

                return response()->json([
                    'success' => false,
                    'message' => 'Format gambar tidak valid.'
                ], 400);

            }

            // =====================================================
            // SIMPAN GAMBAR
            // =====================================================

            $fileName = Str::uuid() . '.jpg';

            Storage::disk('public')->put(
                $fileName,
                $imageData
            );

            $mimeType = 'image/jpeg';

            $base64Image = base64_encode($imageData);

            // =====================================================
            // PROMPT GEMINI
            // =====================================================

            $prompt = <<<PROMPT
Kamu adalah AI Daurin.

Daurin adalah platform AI yang membantu pengguna memanfaatkan barang bekas melalui konsep upcycling.

Analisis gambar yang diberikan.

Jawab HANYA menggunakan JSON valid.

Jangan gunakan markdown.

Jangan gunakan ```json.

Jangan tambahkan penjelasan.

Tentukan:

- object
- material
- category
- condition

Kemudian berikan tepat 5 ide upcycling.

Setiap ide harus memiliki format:

{
  "title": "",
  "difficulty": "",
  "time": "",
  "tools": [],
  "steps": []
}

difficulty hanya boleh:

- Mudah
- Sedang
- Sulit

condition hanya boleh:

- Sangat Baik
- Masih Layak
- Perlu Perbaikan
- Kurang Layak

Format akhir:

{
  "object": "",
  "material": "",
  "category": "",
  "condition": "",
  "recommendations": [
    {
      "title": "",
      "difficulty": "",
      "time": "",
      "tools": [],
      "steps": []
    }
  ]
}
PROMPT;

            // =====================================================
            // REQUEST GEMINI
            // =====================================================

            $response = Http::timeout(120)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post(
                    "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.6-flash:generateContent?key={$apiKey}",
                    [
                        "contents" => [
                            [
                                "parts" => [
                                    [
                                        "text" => $prompt
                                    ],
                                    [
                                        "inlineData" => [
                                            "mimeType" => $mimeType,
                                            "data" => $base64Image
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                );

            if (!$response->successful()) {

                return response()->json([
                    'success' => false,
                    'status' => $response->status(),
                    'error' => $response->json()
                ], $response->status());

            }

            $result = $response->json();

                        // =====================================================
            // AMBIL JAWABAN GEMINI
            // =====================================================

            $reply = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';

            if (empty($reply)) {

                return response()->json([
                    'success' => false,
                    'message' => 'Gemini tidak mengembalikan jawaban.'
                ], 500);

            }

            // =====================================================
            // BERSIHKAN JSON
            // =====================================================

            $reply = str_replace('```json', '', $reply);
            $reply = str_replace('```', '', $reply);
            $reply = trim($reply);

            // =====================================================
            // DECODE JSON
            // =====================================================

            $json = json_decode($reply, true);

            if (json_last_error() !== JSON_ERROR_NONE) {

                return response()->json([
                    'success' => false,
                    'message' => 'JSON Gemini tidak valid.',
                    'raw' => $reply
                ], 500);

            }

            // =====================================================
            // AMBIL DATA
            // =====================================================

            $object = $json['object'] ?? 'Tidak diketahui';
            $material = $json['material'] ?? 'Tidak diketahui';
            $category = $json['category'] ?? 'Tidak diketahui';
            $condition = $json['condition'] ?? 'Tidak diketahui';
            $recommendations = $json['recommendations'] ?? [];

            // =====================================================
            // SIMPAN KE DATABASE
            // =====================================================

            $history = ScanHistory::create([
                'image' => $fileName,
                'object' => $object,
                'material' => $material,
                'category' => $category,
                'condition' => $condition,
                'recommendations' => $recommendations
            ]);

            // =====================================================
            // SIMPAN KE SESSION
            // =====================================================

            session([
                'last_scan' => [
                    'id' => $history->id,
                    'image' => $fileName,
                    'object' => $object,
                    'material' => $material,
                    'category' => $category,
                    'condition' => $condition,
                    'recommendations' => $recommendations
                ]
            ]);
                        // =====================================================
            // RESPONSE
            // =====================================================

            return response()->json([
                'success' => true,
                'id' => $history->id,
                'image' => asset('storage/' . $fileName),
                'object' => $object,
                'material' => $material,
                'category' => $category,
                'condition' => $condition,
                'recommendations' => $recommendations
            ]);

        } catch (\Throwable $e) {

            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menganalisis gambar.',
                'error' => app()->environment('local')
                    ? $e->getMessage()
                    : null,
                'line' => app()->environment('local')
                    ? $e->getLine()
                    : null,
                'file' => app()->environment('local')
                    ? basename($e->getFile())
                    : null
            ], 500);

        }
    }
}