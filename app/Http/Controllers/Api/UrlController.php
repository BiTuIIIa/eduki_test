<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use App\Services\CodeService;
use App\Services\UrlService;
use Illuminate\Http\JsonResponse;

class UrlController extends Controller
{
    private CodeService $codeService;

    private UrlService $urlService;
    public function __construct(CodeService $codeService, UrlService $urlService)
    {
        $this->codeService = $codeService;
        $this->urlService = $urlService;
    }

    public function shorten(UrlRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $code = $this->codeService->generateUnique();
        $this->urlService->storeUrl($validatedData['url'], $code);

        return response()->json(['shortened_url' => url('/') . '/' . $code]);

    }
}
