<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{

    public function switch(Request $request, $locale)
    {
        if (!in_array($locale, ['en', 'el'])) {
            $locale = 'en';
        }

        // Get the current URL without the domain
        $previousUrl = str_replace(url('/'), '', url()->previous());

        // Split the URL into segments
        $segments = explode('/', trim($previousUrl, '/'));

        // Check if the first segment is a language code
        if (in_array($segments[0] ?? null, ['en', 'el'])) {
            // Replace the language code
            $segments[0] = $locale;
        } else {
            // Prepend the new language code
            array_unshift($segments, $locale);
        }

        // Rebuild the URL
        $newUrl = implode('/', $segments);

        // Set the new locale in session
        session(['locale' => $locale]);

        // Redirect to the new URL
        return Redirect::to($newUrl);
    }

}
