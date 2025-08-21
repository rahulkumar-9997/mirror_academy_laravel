<?php
// app/Providers/ViewServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Courses;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(['frontend.layouts.header-menu'], function ($view) {
            if ($view->getName() === 'frontend.layouts.header-menu') {
                $menuCourses = Courses::select('id', 'title', 'slug')
                ->where('status', 1)->get();
                $view->with('menuCourses', $menuCourses);
            }
        });
    }
}
