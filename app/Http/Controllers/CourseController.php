<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty(Session::get('id'))) {
            return redirect('admin/login');
        } else {
            return view('backend.course', [
                "data"  => Course::select("courses.*", "categories.name as category")
                    ->join("categories", 'categories.id', '=', 'courses.id_category')
                    ->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (empty(Session::get('id'))) {
            return redirect('admin/login');
        } else {
            return view("backend.course_create", [
                "category" => Category::all()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => "required|min:4",
            'category'      => 'required',
            'price'         => 'required',
            'description'   => 'required',
            'status'        => 'required'
        ]);
        if (empty(Session::get('id'))) {
            return redirect('admin/login');
        } else {
            $photo = "";
            if ($request->hasFile("photo")) {
                $photo = Uuid::uuid4();
                $request->file("photo")->move(
                    "./media/",
                    $photo
                );
            } else {
                $photo = "no-pict.png";
            }
            $discount = 0;
            if (empty($request->discount)) {
                $discount = 0;
            } else {
                $discount = $request->discount;
            }

            Course::insert([
                "id"             => Uuid::uuid4(),
                "name"           => $request->name,
                "id_category"    => $request->category,
                "price"          => $request->price,
                "discount"       => $discount,
                "description"    => $request->description,
                "status"         => $request->status,
                "photos"         => $photo,
                "created_at"    => date('Y-m-d H:i:s')
            ]);

            return redirect("admin/course.html")->with("alert", "Berhasil membuat paket materi baru!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        if (empty(Session::get('id'))) {
            return redirect('admin/login');
        } else {
            return view('backend.course_update', [
                "data"      => $course,
                "categories"  => Category::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        if (empty(Session::get('id'))) {
            return redirect('admin/login');
        } else {
            $photo = "";
            if ($request->hasFile("photo")) {
                if ($course->photos != "no-pict.png") {
                    if (File::exists("./media/" . $course->photos)) {
                        File::delete("./media/" . $course->photos);
                    }
                }
                $photo = Uuid::uuid4();
                $request->file("photo")->move(
                    "./media/",
                    $photo
                );
            } else {
                $photo = $course->photos;
            }

            $discount = 0;
            if (empty($request->discount)) {
                $discount = 0;
            } else {
                $discount = $request->discount;
            }

            Course::where("id", $course->id)
                ->update([
                    "name"           => $request->name,
                    "id_category"    => $request->category,
                    "price"          => $request->price,
                    "discount"       => $discount,
                    "description"    => $request->description,
                    "status"         => $request->status,
                    "photos"         => $photo,
                    "updated_at"    => date('Y-m-d H:i:s')
                ]);

            return redirect("admin/course.html")->with("alert", "Berhasil mengubah paket materi!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (empty(Session::get('id'))) {
            return redirect('admin/login');
        } else {
            Course::destroy($course->id);
            return redirect("admin/course.html")->with("alert", "Berhasil menghapus paket materi!");
        }
    }
}
