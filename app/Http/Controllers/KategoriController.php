<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        //landing page admin kategori
        return view('admin.kategori');
    }

    public function TambahKategori(Request $request)
    {
        $this->imageUploadPost($request);
        return back();
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        dd($imageName);
        $request->gambar->move(public_path('kategori'), $imageName);;
        /* Store $imageName name in DATABASE from HERE */

        // return back()
        //     ->with('success', 'You have successfully upload image.')
        //     ->with('image', $imageName);
    }
}
