<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Member;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $content = Cache::remember('sitemap.xml', 3600, function () {
            $locales = ['en', 'el'];

            $pages = Page::where('active', true)->get();
            $members = Member::active()->get();
            $categories = Category::all();

            $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            foreach ($locales as $locale) {
                $content .= $this->url(route('home', ['locale' => $locale]), '1.0', 'weekly');

                $content .= $this->url(route('members', ['locale' => $locale]), '0.6', 'monthly');

                foreach ($categories as $category) {
                    $content .= $this->url(
                        route('page.category', ['locale' => $locale, 'category' => $category->slug]),
                        '0.5',
                        'weekly',
                        $category->updated_at
                    );
                }

                foreach ($pages as $page) {
                    $content .= $this->url(
                        route('page.single', ['locale' => $locale, 'page' => $page->slug]),
                        '0.8',
                        'monthly',
                        $page->updated_at
                    );
                }

                foreach ($members as $member) {
                    $content .= $this->url(
                        route('member.single', ['locale' => $locale, 'member' => $member->slug]),
                        '0.6',
                        'monthly',
                        $member->updated_at
                    );
                }
            }

            $content .= '</urlset>';

            return $content;
        });

        return response($content, 200, ['Content-Type' => 'application/xml']);
    }

    private function url(string $loc, string $priority, string $changefreq, ?\Carbon\Carbon $lastmod = null): string
    {
        $url = '  <url>' . "\n";
        $url .= '    <loc>' . e($loc) . '</loc>' . "\n";
        if ($lastmod) {
            $url .= '    <lastmod>' . $lastmod->toW3cString() . '</lastmod>' . "\n";
        }
        $url .= '    <changefreq>' . $changefreq . '</changefreq>' . "\n";
        $url .= '    <priority>' . $priority . '</priority>' . "\n";
        $url .= '  </url>' . "\n";
        return $url;
    }
}
