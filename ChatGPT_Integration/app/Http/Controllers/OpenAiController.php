<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;


class OpenAiController extends Controller
{
    public function index(): JsonResponse
    {
        $search = 'AIUB Means?';
        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.env('OpenAiKey'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo-0125',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $search
                ]
            ],
            'temperature' => 0.5,
            'max_tokens' => 200, // Corrected parameter name
            'top_p' => 1.0,
            'frequency_penalty' => 0.52,
            'presence_penalty' => 0.5,
            'stop' => ["11."],
        ])->json();

        return response()->json(
            $data['choices'][0]['message'], // Data to be returned as JSON
            200,                             // HTTP status code (OK)
            [],                              // Headers (empty in this case)
            JSON_PRETTY_PRINT                // JSON options for pretty printing
        );
    }
}
