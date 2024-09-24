<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Handle the image upload.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');
        return back()->with('success', 'Image uploaded successfully!')->with('path', $path);
    }
}

