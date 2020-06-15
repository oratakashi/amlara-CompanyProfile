<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use App\Admin;

class Dashboard extends Controller
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
            return view('backend.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!empty(Session::get('id'))) {
            return redirect('admin');
        } else {
            return view('backend.login', ["title" => 'Login - Amanah Kitchen']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (!empty(Session::get('id'))) {
            return redirect('admin');
        }
        $data = Admin::where("username", $request->username)
            ->where("password", sha1($request->password))
            ->first();
        if ($data) {
            Session::put("username", $data['username']);
            Session::put("name", $data['name']);
            Session::put("id", $data['id']);

            return redirect("admin");
        } else {
            return redirect("admin/login")->with('alert', 'Username / Password Salah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Session::flush();
        return redirect('/admin/login')->with('alert', 'Kamu sudah logout!');
    }
}
