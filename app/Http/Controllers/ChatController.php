<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        try {

            // =====================================================
            // VALIDASI
            // =====================================================

            $request->validate([
                'message' => 'required|string|max:1000'
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
            // HASIL SCAN TERAKHIR
            // =====================================================

            $scan = session('last_scan');

        // =====================================================
        // PROMPT SYSTEM
        // =====================================================

        $prompt = <<<PROMPT
Kamu adalah AI AIBEKU.

AI AIBEKU adalah AI Creative Assistant yang membantu pengguna mengenai:

- Upcycling
- Daur ulang
- Kerajinan
- Ide kreatif
- Pemanfaatan barang bekas

Jawablah dengan ramah, jelas, mudah dipahami, dan berikan solusi yang praktis.

PROMPT;

        // =====================================================
        // JIKA SUDAH ADA HASIL SCAN
        // =====================================================

        if ($scan) {

            $prompt .= "

Pengguna baru saja melakukan scan barang.

Object:
{$scan['object']}

Material:
{$scan['material']}

Category:
{$scan['category']}

Condition:
{$scan['condition']}

Rekomendasi Upcycling:
";

            foreach ($scan['recommendations'] as $index => $idea) {

                $number = $index + 1;

                $prompt .= "

{$number}. {$idea['title']}
Kesulitan: {$idea['difficulty']}
Estimasi: {$idea['time']}
";

            }

            $prompt .= "

Gunakan hasil scan di atas sebagai konteks utama saat menjawab pertanyaan pengguna.
";

        }

        // =====================================================
        // JIKA BELUM SCAN
        // =====================================================

        else {

            $prompt .= "

Pengguna belum melakukan scan barang.

Tetap jawab seluruh pertanyaan mengenai upcycling, daur ulang, dan pemanfaatan barang bekas.

Jika pengguna meminta saran yang spesifik terhadap suatu barang, sarankan menggunakan fitur Scan Barang agar kamu dapat memberikan jawaban yang lebih akurat.
";

        }
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
                                        "text" => "Pertanyaan pengguna:\n\n" . $request->message
                                    ]
                                ]
                            ]
                        ]
                    ]
                );

            // =====================================================
            // CEK RESPONSE
            // =====================================================

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
            // RESPONSE
            // =====================================================

            return response()->json([
                'success' => true,
                'reply' => trim($reply)
            ]);

        } catch (\Throwable $e) {

            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses chat.',
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