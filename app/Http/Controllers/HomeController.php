<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Detail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home', [
            "course"        => Course::with("category")
                ->where("status", 1)
                ->orderBy("name", "asc")
                ->get()
        ]);
    }

    public function show(Course $course){
        return view('frontend.detail', [
            "course"    => $course,
            "materi"    => Product::with("details")
                ->where("id_course", $course->id)
                ->orderBy("name", "asc")
                ->get()
        ]);
    }
}
