<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        //landing page admin produk
        return view('admin.produk');
    }
}
