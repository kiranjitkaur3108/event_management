<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
// Normally fetch dynamic data; here we show static content example
        return view('home');
    }

    public function about()
    {
        return view('about');
    }
}
