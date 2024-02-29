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
        try {
            $validatedData = $request->validated();
            $code = $this->codeService->generateUnique();
            $this->urlService->storeUrl($validatedData['url'], $code);

            return response()->json(['shortened_url' => url('/') . '/' . $code]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while shortening the URL.'], 500);
        }
    }

    public function getVisitorsCount(string $code): JsonResponse
    {
        try {
            $visitorsCount = $this->urlService->getVisitorsCount($code);

            return response()->json(['visitors_count' => $visitorsCount]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while retrieving visitors count.'], 500);
        }
    }
}
