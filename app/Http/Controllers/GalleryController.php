<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    // GalleryController.php
    public function index()
    {
        // Group all gallery images by event name
        $groupedImages = Gallery::all()->groupBy('event_name');

        // Pass grouped data to Blade
        return view('gallery', compact('groupedImages'));
    }



}