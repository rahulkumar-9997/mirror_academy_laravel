<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    public function run(): void
    {
        $icons = [
            ['class' => 'fa fa-check', 'name' => 'Check'],
            ['class' => 'fa fa-star', 'name' => 'Star'],
            ['class' => 'fa fa-thumbs-up', 'name' => 'Thumbs Up'],
            ['class' => 'fa fa-book', 'name' => 'Book'],
            ['class' => 'fa fa-graduation-cap', 'name' => 'Graduation Cap'],
            ['class' => 'fa fa-lightbulb', 'name' => 'Lightbulb'],
            ['class' => 'fa fa-rocket', 'name' => 'Rocket'],
            ['class' => 'fa fa-globe', 'name' => 'Globe'],
            ['class' => 'fa fa-users', 'name' => 'Users'],
            ['class' => 'fa fa-chart-line', 'name' => 'Chart Line'],
            ['class' => 'fa fa-clock', 'name' => 'Clock'],
            ['class' => 'fa fa-heart', 'name' => 'Heart'],
            ['class' => 'fa fa-comments', 'name' => 'Comments'],
            ['class' => 'fa fa-bell', 'name' => 'Bell'],
            ['class' => 'fa fa-certificate', 'name' => 'Certificate'],
            ['class' => 'fa fa-trophy', 'name' => 'Trophy'],
            ['class' => 'fa fa-briefcase', 'name' => 'Briefcase'],
            ['class' => 'fa fa-suitcase', 'name' => 'Suitcase'],
            ['class' => 'fa fa-laptop', 'name' => 'Laptop'],
            ['class' => 'fa fa-mobile', 'name' => 'Mobile'],
            ['class' => 'fa fa-tablet', 'name' => 'Tablet'],
            ['class' => 'fa fa-desktop', 'name' => 'Desktop'],
            ['class' => 'fa fa-camera', 'name' => 'Camera'],
            ['class' => 'fa fa-video', 'name' => 'Video'],
            ['class' => 'fa fa-music', 'name' => 'Music'],
            ['class' => 'fa fa-paint-brush', 'name' => 'Paint Brush'],
            ['class' => 'fa fa-pencil', 'name' => 'Pencil'],
            ['class' => 'fa fa-bookmark', 'name' => 'Bookmark'],
            ['class' => 'fa fa-map', 'name' => 'Map'],
            ['class' => 'fa fa-map-marker', 'name' => 'Map Marker'],
            ['class' => 'fa fa-map-signs', 'name' => 'Map Signs'],
            ['class' => 'fa fa-compass', 'name' => 'Compass'],
            ['class' => 'fa fa-search', 'name' => 'Search'],
            ['class' => 'fa fa-search-plus', 'name' => 'Search Plus'],
            ['class' => 'fa fa-search-minus', 'name' => 'Search Minus'],
            ['class' => 'fa fa-filter', 'name' => 'Filter'],
            ['class' => 'fa fa-sliders', 'name' => 'Sliders'],
            ['class' => 'fa fa-home', 'name' => 'Home'],
            ['class' => 'fa fa-user', 'name' => 'User'],
            ['class' => 'fa fa-cog', 'name' => 'Settings'],
        ];

        DB::table('icons')->insert($icons);
    }
}
