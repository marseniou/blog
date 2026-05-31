<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class CategoryController extends Controller
{
    public function single($locale, Category $category)
    {
        SEOMeta::setTitle($category->name);
        SEOMeta::setCanonical(request()->url());

        OpenGraph::setTitle($category->name . ' — Nikos Engonopoulos Archive');
        OpenGraph::setUrl(request()->url());
        OpenGraph::setType('website');

        $pages = $category->pages()
            ->where('active', true)
            ->orderBy('ontop', 'desc')
            ->latest()
            ->paginate(12);

        if ($first = $pages->first()) {
            if ($first->excerpt) {
                OpenGraph::setDescription(strip_tags($first->excerpt));
            }
            if ($first->featured_image) {
                OpenGraph::addImage(url("/storage/" . $first->featured_image));
            }
        }

        return view('components.pages.category', compact('pages', 'category'));
    }
}
