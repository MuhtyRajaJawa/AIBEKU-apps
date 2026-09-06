<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    protected string $apiKey;

    protected string $model = 'gemini-2.5-flash';

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    protected function endpoint()
    {
        return "https://generativelanguage.googleapis.com/v1beta/models/{$this->model}:generateContent?key={$this->apiKey}";
    }

    protected function request(array $parts)
    {
        $response = Http::timeout(60)
            ->acceptJson()
            ->post($this->endpoint(), [
                "contents" => [
                    [
                        "parts" => $parts
                    ]
                ]
            ]);

        if (!$response->successful()) {

            throw new \Exception(
                $response->body()
            );

        }

        return $response->json();
    }

    protected function extractText(array $response)
    {
        return $response['candidates'][0]['content']['parts'][0]['text'] ?? '';
    }

    protected function cleanJson(string $text)
    {
        $text = str_replace("```json", "", $text);
        $text = str_replace("```", "", $text);

        return trim($text);
    }

    public function analyzeImage(string $base64)
    {
        $prompt = <<<PROMPT
Kamu adalah AI AIBEKU.

Analisis gambar yang diberikan.

Balas HANYA dalam format JSON berikut.

{
  "object":"",
  "material":"",
  "category":"",
  "condition":"",
  "recommendations":[
    {
      "title":"",
      "difficulty":"",
      "time":"",
      "tools":[],
      "steps":[]
    }
  ]
}

Jangan gunakan markdown.
Jangan gunakan ```json.
PROMPT;

        $result = $this->request([

            [
                "text" => $prompt
            ],

            [
                "inlineData" => [
                    "mimeType" => "image/jpeg",
                    "data" => $base64
                ]
            ]

        ]);

        return json_decode(
            $this->cleanJson(
                $this->extractText($result)
            ),
            true
        );
    }

    public function chat(array $context, string $message)
    {
        $prompt = "

Kamu adalah AI Assistant AIBEKU.

Konteks hasil analisis:

".json_encode($context, JSON_PRETTY_PRINT)."

Jawablah pertanyaan pengguna berdasarkan konteks tersebut.

";

        $result = $this->request([

            [
                "text" => $prompt."\n\nUser : ".$message
            ]

        ]);

        return $this->extractText($result);
    }
}