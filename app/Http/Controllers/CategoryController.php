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

        SEOMeta::setTitle('ArchArt ' . $category->name);
        OpenGraph::setTitle('ArchArt ' . $category->name);
        //OpenGraph::addImage(url("/storage/" . $member->image));

        $pages = $category->pages()->paginate(10);
        return view('components.pages.category', compact('pages', 'category'));
    }
}
