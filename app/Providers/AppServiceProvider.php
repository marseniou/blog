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
    }
}
