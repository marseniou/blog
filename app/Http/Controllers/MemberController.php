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
        SEOMeta::setCanonical(request()->url());

        OpenGraph::setTitle($member->name . ' — ArchArt Research Team');
        OpenGraph::setUrl(request()->url());
        OpenGraph::setType('profile');

        if ($member->excerpt) {
            SEOMeta::setDescription(strip_tags($member->excerpt));
            OpenGraph::setDescription(strip_tags($member->excerpt));
        }

        if ($member->image) {
            OpenGraph::addImage(url("/storage/" . $member->image));
        }

        return view('components.members.single', compact('member'));
    }
    public function grid()
    {
        if (app()->getLocale() === 'en') {
            SEOMeta::setTitle("Research Team — ArchArt Project");
            SEOMeta::setDescription("Researchers and academics from Panteion University, Athens School of Fine Arts and University of West Attica working on the digitization and documentation of the Nikos Engonopoulos archive.");
            OpenGraph::setTitle("Research Team — ArchArt Project");
            OpenGraph::setDescription("Researchers from Panteion University, ASFA and UniWA digitizing the Nikos Engonopoulos archive.");
        } else {
            SEOMeta::setTitle("Ερευνητική Ομάδα — ArchArt Project");
            SEOMeta::setDescription("Ερευνητές και ακαδημαϊκοί από το Πάντειο Πανεπιστήμιο, την ΑΣΚΤ και το ΠΑΔΑ που εργάζονται για την ψηφιοποίηση και τεκμηρίωση του αρχείου του Νίκου Εγγονόπουλου.");
            OpenGraph::setTitle("Ερευνητική Ομάδα — ArchArt Project");
            OpenGraph::setDescription("Ερευνητές από Πάντειο, ΑΣΚΤ και ΠΑΔΑ ψηφιοποιούν το αρχείο του Νίκου Εγγονόπουλου.");
        }
        SEOMeta::setCanonical(request()->url());
        OpenGraph::setType('website');

        $members = Member::active()->get();
        return view('components.members.grid', compact('members'));
    }
}
