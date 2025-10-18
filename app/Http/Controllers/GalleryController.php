<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::all(); // Fetch all images from DB
        return view('gallery', compact('images')); // Pass $images to blade
    }


}
