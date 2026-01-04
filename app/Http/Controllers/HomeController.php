<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $nama = "budi";
        return view(view: 'welcome', data:[user => $nama]);
    }
}
