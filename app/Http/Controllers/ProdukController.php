<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        //landing page admin produk
        $kategories  = Kategori::all();
        return view('admin.product.produk', compact('kategories'));
    }

    public function TambahProduct(Request $request)
    {
        $imageName = $this->imageUploadPost($request);
        Product::insert([
            'nama' => $request->nama,
            'gambar' => "/products/" . $imageName,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'created_at' => now(),
        ]);
        return back()->with('msg', 'berhasil masukan produk baru');
    }

    public function imageUploadPost(Request $request)
    {
        // $request->validate([
        //     'gambar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $imageName = 'product_' . time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('products'), $imageName);
        return $imageName;
    }

    public function lihatProduct()
    {
        $products = Product::paginate(5);
        return view('admin.product.lihatProduct', compact(['products']));
    }

    public function cariProduct(Request $request)
    {
        $nama = $request->nama;
        $paginate = $request->paginate == null ? 5 : $request->paginate;
        $products = Product::where('nama', 'LIKE', $nama . '%')->paginate($paginate);
        return view('admin.product.lihatProduct', compact(['products']));
    }

    public function cariProductHome(Request $request)
    {
        $nama = $request->nama;
        $paginate = $request->paginate == null ? 5 : $request->paginate;
        $products = Product::where('nama', 'LIKE', $nama . '%')->paginate($paginate);
        $url_form = '/shop/cariProduct';
        $url_detail = '/shop/detail/';
        $placeholder = 'Nama Produk yang dicari';
        return view('shop', compact(['products', 'url_form', 'placeholder']));
    }

    public function editOrDelete(Request $req)
    {
        Product::find($req->btnDelete)->delete();
        return back();
    }

    public function showEdit($id)
    {
        $product = Product::find($id);
        $kategories = Kategori::all();
        return view('admin.product.edit', compact(['product', 'kategories']));
    }

    public function editProduct(Request $req)
    {
        if ($req->gambar) {
            $imageName = $this->imageUploadPost($req);
        }
        $product = Product::find($req->idUpdate);

        if ($req->gambar) {
            $product->update([
                'nama' => $req->nama,
                'gambar' => "/products/" . $imageName,
                'harga' => $req->harga,
                'stok' => $req->stok,
                'deskripsi' => $req->deskripsi,
                'kategori_id' => $req->kategori_id,
            ]);
        } else {
            $product->update([
                'nama' => $req->nama,
                'harga' => $req->harga,
                'stok' => $req->stok,
                'deskripsi' => $req->deskripsi,
                'kategori_id' => $req->kategori_id,
            ]);
        }


        return redirect('/admin/produk/lihatProduct');
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $relevans = $product->kategori->product->sortByDesc('created_at')->take(2);
        // dd($relevans);
        return view('detail', compact(['product', 'relevans']));
    }

    public function showAll()
    {
        $products = Product::paginate(8);
        $url_form = '/shop/cariProduct';
        $url_detail = '/shop/detail/';
        $placeholder = 'Nama Produk yang dicari';
        return view('shop', compact(['products', 'url_form', 'placeholder', 'url_detail']));
    }
}
