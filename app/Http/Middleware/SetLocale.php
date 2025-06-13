<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        // Check session if no locale in URL (for non-prefixed routes)
        if (!in_array($locale, ['en', 'el'])) {
            $locale = session('locale', 'en');
        }

        // If still not valid, default to English
        if (!in_array($locale, ['en', 'el'])) {
            $locale = 'en';
        }

        App::setLocale($locale);
        session(['locale' => $locale]);
        URL::defaults(['locale' => $locale]);

        return $next($request);
    }
}
