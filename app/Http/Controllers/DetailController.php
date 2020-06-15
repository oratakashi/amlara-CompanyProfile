<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class DetailController extends Controller
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
            if (isset($_GET['product']) && $_GET['product'] != 'all') {
                return view("backend.detail", [
                    "product"       => Product::all(),
                    "id_product"    => $_GET['product'],
                    "data"          => Detail::select("details.*", "products.name as product")
                        ->join("products", "products.id", "=", "details.id_product")
                        ->where("details.id_product", $_GET['product'])
                        ->get()
                ]);
            } elseif (isset($_GET['product']) && $_GET['product'] == 'all') {
                return redirect("admin/details.html");
            } else {
                return view("backend.detail", [
                    "product"       => Product::all(),
                    "id_product"    => "null",
                    "data"          => Detail::select("details.*", "products.name as product")
                        ->join("products", "products.id", "=", "details.id_product")
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
            return view("backend.detail_create", [
                "product"       => Product::all()
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
            "product"    => "required",
            "name"       => "required|min:4"
        ]);
        if (empty(Session::get("id"))) {
            return redirect("admin/login");
        } else {
            Detail::insert([
                "id"            => Uuid::uuid4(),
                "name"          => $request->name,
                "id_product"    => $request->product,
                "created_at"    => date('Y-m-d H:i:s')
            ]);
            return redirect("admin/details.html")->with("alert", "Berhasil menambah pilihan materi baru!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        if(empty(Session::get("id"))){
            return redirect("admin/login");
        }else{
            Detail::destroy($detail->id);
            return redirect("admin/details.html")->with("alert", "Berhasil menghapus pilihan materi!");
        }
    }
}
