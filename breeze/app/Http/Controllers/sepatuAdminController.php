<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\toko;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class sepatuAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tittle = 'Admin Sepatu';
        //$produk = Produk::paginate(3);
        $produk = new Produk;
        if (isset($_GET['s'])) {
            $s=$_GET['s'];

            $produk = $produk->where('nama_produk', 'like', "%$s%");
        }
        if (isset($_GET['id_toko'])&&$_GET['id_toko']!='') {

            $produk = $produk->where('nama_produk', 'like', $_GET['id_toko']);
        }
        $produk = $produk->paginate(3);
        // $produk = $produk->get();
        $toko = Toko::all();
        //dd($produk);
        return view('backpage.adminSepatu', compact('tittle', 'produk', 'toko'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'create Home Shoes';
        $toko =  Toko::all();
        return view('backpage.inputproduk', compact('title','toko'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = [
            'required' => 'kolom:attribute harus lengkap',
            'numeric' => 'kolom:attribute harus unik',
            'file' => 'perhatikan format dan size file'
        ];

        $validasi = $request->validate([
            'kode_produk'=>'required',
            'nama_produk'=>'required',
            'desk_produk'=>'',
            'id_toko' =>'required',
            'lokasi' =>'required',
            'img_produk' => 'required|image|mimes:png,jpg|max:5260',
            'harga' =>'',
        ]);
        try {
            $fileName = time() . $request->file('img_produk')->getClientOriginalName();

            $path = $request->file('img_produk')->storeAs('photo',$fileName);

            $validasi['img_produk'] = $path;
            $response = Produk::create($validasi);
            return redirect('produk');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Home Shoes';
        $toko =  Toko::all();
        $produk = produk::find($id);
        return view('backpage.inputproduk', compact('title','toko','produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesan = [
            'required' => 'kolom:attribute harus lengkap',
            'numeric' => 'kolom:attribute harus unik',
            'file' => 'perhatikan format dan size file'
        ];

        $validasi = $request->validate([
            'kode_produk'=>'required',
            'nama_produk'=>'required',
            'desk_produk'=>'',
            'id_toko' =>'required',
            'lokasi' =>'required',
            'img_produk' => '',
            'harga' =>'',
        ]);
        try {
           if($request->file('img_produk')){
            $fileName = time() . $request->file('img_produk')->getClientOriginalName();

            $path = $request->file('img_produk')->storeAs('photo',$fileName);

            $validasi['img_produk'] = $path;
           } 
           
            $response = Produk::find($id)->update($validasi);
            return redirect('produk');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $produk=Produk::find($id);
            $produk->delete();
            return redirect('produk');
        }   catch (\Throwable $e) {
                echo $e->getMessage();
        }
    
    }
}