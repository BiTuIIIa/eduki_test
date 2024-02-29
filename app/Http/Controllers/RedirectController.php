<?php

namespace App\Http\Controllers;

use App\Services\UrlService;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    private UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function redirect(string $code): RedirectResponse
    {
        $url = $this->urlService->addVisitors($code);

        return redirect($url->original_url);
    }
}
