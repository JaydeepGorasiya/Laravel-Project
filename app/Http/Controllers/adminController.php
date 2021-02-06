<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Theme\Metronic;
use App\Models\User;

class adminController extends Controller
{
    function index()
    {
       $users = User::get();
        return view('home',['users'=>$users]);
    }

    function edit(request $req)
    {
        $name = $req->name;
        return view('edit');
    }
}
