<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GalleryController extends Controller
{
    public function showGallery()
    {
        // Replace with your image filenames
        $images = ['Psq2.png', 'Psq3.png', 'Ps4.png'];

        return view('gallery', compact('images'));
    }
}
