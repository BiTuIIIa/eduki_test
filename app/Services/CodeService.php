<?php

namespace App\Services;

use App\Models\Url;

class CodeService
{
    public function generateUnique(): string
    {
        $codeLength = 6;
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        while (true) {
            $code = '';
            for ($i = 0; $i < $codeLength; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }

            if (!Url::where('code', $code)->exists()) {
                break;
            }
        }

        return $code;

    }
}
