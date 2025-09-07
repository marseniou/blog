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
        OpenGraph::setTitle($page->title);

        OpenGraph::addImage(url("/storage/" . $page->featured_image));
        return view('components.pages.single', compact('page'));
    }
}
