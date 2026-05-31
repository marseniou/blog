<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class PageController extends Controller
{
    public function single($locale, Page $page)
    {
        SEOMeta::setTitle($page->title);
        SEOMeta::setCanonical(request()->url());
        SEOMeta::addKeyword($page->category?->name);

        OpenGraph::setTitle($page->title);
        OpenGraph::setUrl(request()->url());
        OpenGraph::setType('article');

        if ($page->excerpt) {
            SEOMeta::setDescription(strip_tags($page->excerpt));
            OpenGraph::setDescription(strip_tags($page->excerpt));
        }

        if ($page->featured_image) {
            OpenGraph::addImage(url("/storage/" . $page->featured_image));
        }

        return view('components.pages.single', compact('page'));
    }
}
