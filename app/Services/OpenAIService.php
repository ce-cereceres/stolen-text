<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function generateText($prompt)
    {
        $response = $this->client->post('https://api.openai.com/v1/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',  // or 'gpt-3.5-turbo'
                'prompt' => $prompt,
                'max_tokens' => 150,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['choices'][0]['text'];
    }
}