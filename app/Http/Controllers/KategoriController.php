<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        //landing page admin kategori
        return view('admin.kategori.kategori');
    }

    public function TambahKategori(Request $request)
    {
        $imageName = $this->imageUploadPost($request);
        $slug = str_replace(' ', '-', $request->nama);
        Kategori::insert([
            'nama' => $request->nama,
            'gambar' => "/kategoris/" . $imageName,
            'slug' => $slug,
            'created_at' => now(),
        ]);

        return back()->with('msg', 'berhasil masukan kategori baru');
    }

    public function imageUploadPost(Request $request)
    {
        // $request->validate([
        //     'gambar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $imageName = 'kategori_' . time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('kategoris'), $imageName);
        return $imageName;
    }

    public function lihatKategori()
    {
        $kategories = Kategori::paginate(5);
        return view('admin.kategori.lihatKategori', compact(['kategories']));
    }

    public function cariKategori(Request $request)
    {
        $nama = $request->nama;
        $paginate = $request->paginate == null ? 5 : $request->paginate;
        $kategories = Kategori::where('nama', 'LIKE', $nama . '%')->paginate($paginate);
        return view('admin.kategori.lihatKategori', compact(['kategories']));
        // return back()->with('users', $users);
    }

    public function editOrDelete(Request $req)
    {
        Kategori::find($req->btnDelete)->delete();
        return back();
    }

    public function showEdit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact(['kategori']));
    }

    public function editKategori(Request $req)
    {
        if ($req->gambar) {
            $imageName = $this->imageUploadPost($req);
        }

        $kategori = Kategori::find($req->idUpdate);
        if ($req->gambar) {
            $kategori->update([
                'nama' => $req->nama,
                'gambar' => "/kategoris/" . $imageName,
            ]);
        } else {
            $kategori->update([
                'nama' => $req->nama,
            ]);
        }

        return redirect('/admin/kategori/lihatKategori');
    }

    public function cariProductHome(Request $request)
    {
        $nama = $request->nama;
        $paginate = $request->paginate == null ? 5 : $request->paginate;
        $products = Kategori::where('nama', 'LIKE', $nama . '%')->paginate($paginate);
        $url_form = '/kategori/cariKategori';
        $url_detail = '/kategori/detail/';
        $placeholder = 'Nama Kategori yang dicari';
        return view('kategori', compact(['products', 'url_form', 'placeholder']));
    }

    public function showAll()
    {
        $products = Kategori::paginate(8);
        $url_form = '/kategori/cariKategori';
        $url_detail = '/kategori/detail/';
        $placeholder = 'Nama Kategori yang dicari';
        return view('shop', compact(['products', 'url_form', 'placeholder', 'url_detail']));
    }

    public function kategoriDetail($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        $products = Product::where('kategori_id', $kategori->id)->paginate(8);

        $url_form = '/shop/cariProduct';
        $url_detail = '/shop/detail/';
        $placeholder = 'Nama Produk yang dicari';
        return view('shop', compact(['products', 'url_form', 'placeholder', 'url_detail', 'kategori']));
    }
}
