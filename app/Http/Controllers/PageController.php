<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dataScience()
    {
        return view('datascience');
    }

    public function programming()
    {
        return view('home');
    }

    public function devops()
    {
        return view('devops');
    }

    public function design()
    {
        return view('design');
    }
}
