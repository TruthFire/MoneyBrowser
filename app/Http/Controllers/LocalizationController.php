<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class LocalizationController extends Controller
{
    public function handleSwitch($locale): void
    {
        Log::info('langswitch');
        if (isset($locale) && in_array($locale, config('app.available_locales'), true)) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
            Log::info('Locale changed to ' . $locale);

        } else {
            app()->setLocale(config('app.fallback_locale'));
            session()->put('locale', config('app.fallback_locale'));
            Log::info('using fallback locale');
        }

    }
}
