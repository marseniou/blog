<?php


// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Member;
use App\Models\Page;
use App\Models\Category;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(app()->getLocale() === 'en' ? 'Home' : 'Αρχική', route('home'));
});
Breadcrumbs::for('members', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(app()->getLocale() === 'en' ? 'Members' : 'Μέλη', route('members',));
});

Breadcrumbs::for('member.single', function (BreadcrumbTrail $trail, Member $member) {
    $trail->parent('members');
    $trail->push($member->name, route('member.single', $member));
});
Breadcrumbs::for('page.single', function (BreadcrumbTrail $trail, Page $page) {
    $trail->parent('home');
    $trail->push($page->category->name, route('page.category', $page->category));
    $trail->push($page->title, route('page.single', $page));
});
Breadcrumbs::for('page.category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('home');
    $trail->push($category->name, route('page.category', $category));
});
