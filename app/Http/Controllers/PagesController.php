<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('spa');
    }

    public function home()
    {
        return view('welcome', [
            'foo' => 'bar'
        ]);
    }

    public function cuisine()
    {
        return view('cuisine.index');
    }
}
