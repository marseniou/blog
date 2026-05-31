<?php

namespace App\Providers;

use App\Models\Page;
use App\Observers\PageObserver;

use App\Filament\Blocks\PdfBlock;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use App\Filament\Blocks\GalleryBlock;
use Illuminate\Support\Facades\Route;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    GalleryBlock::class,
                    PdfBlock::class,

                ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::defaults(['locale' => app()->getLocale()]);

        Model::automaticallyEagerLoadRelationships();

        Page::observe(PageObserver::class);

        view()->composer('components.layouts.main', function () {
            $route = request()->route();

            if (!$route || !$route->getName()) {
                return;
            }

            $name = $route->getName();
            $params = $route->parameters();

            if (in_array(request()->segment(1), ['en', 'el'])) {
                $locales = ['en' => 'en_US', 'el' => 'el_GR'];
                $currentLocale = app()->getLocale();

                OpenGraph::addProperty('locale', $locales[$currentLocale] ?? 'en_US');

                foreach (['en', 'el'] as $locale) {
                    try {
                        $url = route($name, array_merge($params, ['locale' => $locale]));
                        SEOMeta::addAlternateLanguage($locale, $url);
                    } catch (\Exception $e) {
                        // skip if route can't be generated
                    }
                }
            }
        });
    }
}
