<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $data['courses'] = [];
        return view('backend.pages.courses.index', compact('data'));
    }

    public function create()
    {
        return view('backend.pages.courses.create');
    }
}
