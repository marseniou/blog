<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class MemberController extends Controller
{
    public function single($locale, Member $member)
    {
        SEOMeta::setTitle($member->name);
        OpenGraph::setTitle($member->name);
        OpenGraph::addImage(url("/storage/" . $member->image));
        return view('components.members.single', compact('member'));
    }
    public function grid()
    {
        if (app()->getLocale() === 'en') {
            SEOMeta::setTitle("ArchArt Project Members");
            OpenGraph::setTitle("ArchArt Project Members");
        } else {
            SEOMeta::setTitle("Μέλη του ArchArt Project");
            OpenGraph::setTitle("Μέλη του ArchArt Project");
        }
        $members = Member::all();
        return view('components.members.grid', compact('members'));
    }
}
