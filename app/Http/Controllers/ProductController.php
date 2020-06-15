<?php

namespace App\Http\Controllers;

use App\Course;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty(Session::get("id"))) {
            return redirect("admin/login");
        } else {
            if (isset($_GET['course']) && $_GET['course'] != 'all') {
                return view("backend.products", [
                    "course"    => Course::all(),
                    "id_course" => $_GET['course'],
                    "data"      => Product::select("products.*", "courses.name as course")
                        ->join("courses", "courses.id", "=", "products.id_course")
                        ->where("products.id_course", $_GET['course'])
                        ->get()
                ]);
            } elseif (isset($_GET['course']) && $_GET['course'] == 'all') {
                return redirect("admin/products.html");
            } else {
                return view("backend.products", [
                    "course"    => Course::all(),
                    "id_course" => "null",
                    "data"      => Product::select("products.*", "courses.name as course")
                        ->join("courses", "courses.id", "=", "products.id_course")
                        ->get()
                ]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (empty(Session::get("id"))) {
            return redirect("admin/login");
        } else {
            return view('backend.products_create', [
                "course"    => Course::all()
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
            "course"    => "required",
            "name"      => "required|min:4"
        ]);

        if (empty(Session::get("id"))) {
            return redirect("admin/login");
        } else {
            Product::insert([
                "id"            => Uuid::uuid4(),
                "name"          => $request->name,
                "id_course"     => $request->course,
                "created_at"    => date('Y-m-d H:i:s')
            ]);

            return redirect("admin/products.html")->with("alert", "Berhasil menambah materi baru!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(empty(Session::get("id"))){
            return redirect("admin/login");
        }else{
            Product::destroy($product->id);
            return redirect("admin/products.html")->with("alert", "Berhasil menghapus materi!");
        }
    }
}
