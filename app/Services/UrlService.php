<?php

namespace App\Services;

use App\Models\Url;

class UrlService
{

    public function storeUrl($originalUrl, $code): void
    {
        Url::create([
            'original_url' => $originalUrl,
            'code' => $code,
        ]);
    }

    public function addVisitors($code)
    {
        $url = Url::where('code', $code)->firstOrFail();
        $url->increment('visitors');
        return $url;
    }
}
