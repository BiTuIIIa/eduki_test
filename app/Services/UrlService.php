<?php

namespace App\Services;

use App\Models\Url;

class UrlService
{

    public function storeUrl(string $originalUrl, string $code): void
    {
        Url::create([
            'original_url' => $originalUrl,
            'code' => $code,
        ]);
    }

    public function addVisitors(string $code)
    {
        $url = Url::where('code', $code)->firstOrFail();
        $url->increment('visitors');
        return $url;
    }

    public function getVisitorsCount(string $code): int
    {
        $url = Url::where('code', $code)->first();
        return $url ? $url->visitors : 0;
    }
}
