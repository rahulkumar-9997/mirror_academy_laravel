<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Models\Courses;


class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

       
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/') . '</loc>';
        $sitemap .= '<lastmod>' . Carbon::now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>daily</changefreq>';
        $sitemap .= '<priority>1.0</priority>';
        $sitemap .= '</url>';

        $courses = Courses::get();
        foreach ($courses as $course) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . url($course->slug) . '</loc>';
            $sitemap .= '<lastmod>' . $course->updated_at->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>weekly</changefreq>';
            $sitemap .= '<priority>0.8</priority>';
            $sitemap .= '</url>';
        }
        /**Other page */
        $pages = [
            ['url' => url('contact-us'), 'priority' => '0.6'],
            ['url' => url('about-us'), 'priority' => '0.6'],
            ['url' => url('gallery'), 'priority' => '0.5'],
            ['url' => url('founders-message'), 'priority' => '0.8'],
            ['url' => url('terms-of-use'), 'priority' => '0.9'],
            ['url' => url('privacy-policy'), 'priority' => '0.10'],
        ];
        foreach ($pages as $page) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . $page['url'] . '</loc>';
            $sitemap .= '<lastmod>' . Carbon::now()->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>monthly</changefreq>';
            $sitemap .= '<priority>' . $page['priority'] . '</priority>';
            $sitemap .= '</url>';
        }
        $sitemap .= '</urlset>';
        return Response::make($sitemap, 200, ['Content-Type' => 'application/xml']);
    }
}
