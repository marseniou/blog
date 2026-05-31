<?php
// routes/web.php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SitemapController;

Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'en']);
});
Route::prefix('{locale}')->where(['locale' => 'en|el'])->group(function () {
    Route::get('/', function () {

        if (app()->getLocale() === 'en') {
            SEOMeta::setTitle('Nikos Engonopoulos Digital Archive');
            SEOMeta::setDescription("Digitized archive of Nikos Engonopoulos (1907-1985), the Greek surrealist painter and poet. Over 10,000 documents, manuscripts, photographs and letters digitized by Panteion University, ASFA and UniWA. Funded by HFRI / NextGenerationEU.");
            OpenGraph::setTitle('Nikos Engonopoulos Digital Archive — ArchArt Project');
            OpenGraph::setDescription("Digitized archive of Nikos Engonopoulos (1907-1985), the Greek surrealist painter and poet. Over 10,000 documents, manuscripts, photographs and letters digitized by Panteion University, ASFA and UniWA.");
            OpenGraph::setType('website');
        } else {
            SEOMeta::setTitle('Ψηφιακό Αρχείο Νίκου Εγγονόπουλου');
            SEOMeta::setDescription("Ψηφιοποιημένο αρχείο του Νίκου Εγγονόπουλου (1907-1985), Έλληνα υπερρεαλιστή ζωγράφου και ποιητή. Πάνω από 10.000 τεκμήρια, χειρόγραφα, φωτογραφίες και επιστολές. Έργο των Παντείου, ΑΣΚΤ και ΠΑΔΑ.");
            OpenGraph::setTitle('Ψηφιακό Αρχείο Νίκου Εγγονόπουλου — ArchArt Project');
            OpenGraph::setDescription("Ψηφιοποιημένο αρχείο του Νίκου Εγγονόπουλου (1907-1985), Έλληνα υπερρεαλιστή ζωγράφου και ποιητή. Πάνω από 10.000 τεκμήρια, χειρόγραφα, φωτογραφίες και επιστολές.");
            OpenGraph::setType('website');
        }
        OpenGraph::addImage(url('/storage/logos/archart.jpg'));
        OpenGraph::setUrl(request()->url());
        SEOMeta::setCanonical(request()->url());

        return view('welcome');
    })->name('home');

    Route::get('/page/{page}', [PageController::class, 'single'])->name('page.single');
    Route::get('/members', [MemberController::class, 'grid'])->name('members');
    Route::get('/member/{member}', [MemberController::class, 'single'])->name('member.single');
    Route::get('/category/{category}', [CategoryController::class, 'single'])->name('page.category');
});

Route::get('/switch/{locale}', [LanguageController::class, 'switch'])->name('language.switch');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// Redirect root to default language
