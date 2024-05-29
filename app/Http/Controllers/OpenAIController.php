<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generate(Request $request)
    {
        $prompt = $request->input('prompt');
        $text = $this->openAIService->generateText($prompt);

        return response()->json(['text' => $text]);
    }
}
