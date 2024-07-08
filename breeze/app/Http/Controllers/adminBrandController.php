<?php

namespace App\Http\Controllers;

use App\Models\toko;
use Illuminate\Http\Request;

class adminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tittle = 'Admin Brand';
        //$produk = Produk::paginate(3);
        $toko = new toko();
        if (isset($_GET['s'])) {
            $s=$_GET['s'];

            $toko = $toko->where('nama_toko', 'like', "%$s%");
        }
        if (isset($_GET['id_toko'])&&$_GET['id_toko']!='') {

            $toko = $toko->where('nama_toko', 'like', $_GET['id_toko']);
        }
        $toko = $toko->paginate(3);
        // $produk = $produk->get();
        $toko = toko::all();
        //dd($produk);
        return view('backpage.brand', compact('tittle', 'toko'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'create Home Shoes';
        $toko =  toko::all();
        return view('backpage.inputbrand', compact('title','toko'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nm_toko'=>'required',
            'desk_toko'=>'',
        ]);
        try {
            $response = toko::create($validasi);
            return redirect('toko');
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
    public function edit($id)
    {
    $toko = Toko::findOrFail($id);
    return view('backpage.inputbrand', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validasi = $request->validate([
            'nm_toko' => 'required',
            'desk_toko' => '',

        ]);
    
        try {
            // Find the existing toko instance by ID
            $toko = Toko::findOrFail($id);
    
    
            // Update the toko instance with the validated data
            $toko->update($validasi);
    
            // Redirect to the toko index page with a success message
            return redirect('toko')->with('success', 'Toko updated successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions that occur and display the error message
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $produk=toko::find($id);
            $produk->delete();
            return redirect('toko');
        }   catch (\Throwable $e) {
                echo $e->getMessage();
        }
    }
}
