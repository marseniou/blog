<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $availableLanguages = ['en', 'el'];

        // Get language from URL segment
        $locale = $request->route('locale') ?? 'en';

        if (!in_array($locale, ['en', 'el'])) {
            abort(404);
        }

        app()->setLocale($locale);

        // Set the default for URL generation
        URL::defaults(['locale' => $locale]);

        // Remove locale from request so it doesn't interfere with other route parameters
        $request->route()->forgetParameter('locale');

        return $next($request);


    }
}
