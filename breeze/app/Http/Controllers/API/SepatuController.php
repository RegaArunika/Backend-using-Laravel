<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\produk;
use App\Models\toko;
use Illuminate\Http\Request;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = produk::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'kode_produk'=>'required',
            'nama_produk'=>'required',
            'desk_produk'=>'',
            'id_toko' =>'required',
            'lokasi' =>'required',
            'img_produk' => 'required|image|mimes:png,jpg|max:5260',
            'harga' =>'required|integer'
        ]);

        try{
            $fileName = time().$request->file('img_produk')->getClientOriginalName();
            $path = $request->file('img_produk')->storeAs('photos/produk', $fileName);
            $validasi['img_produk'] = $path;
            $response = produk ::create($validasi);
            return response()->json([
                'success'=> true,
                'message'=>'success'
                
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
            
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'kode_produk'=>'required',
            'nama_produk'=>'required',
            'desk_produk'=>'',
            'id_toko' =>'required',
            'lokasi' =>'required',
            'img_produk' => '',
            'harga'=>''
        ]);
        try {
           if($request->file('img_produk')){
            $fileName = time() . $request->file('img_produk')->getClientOriginalName();

            $path = $request->file('img_produk')->storeAs('photo',$fileName);

            $validasi['img_produk'] = $path;
           } 
           
            $response = produk::find($id)->update($validasi);
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
            $produk=produk::find($id);
            $produk->delete();
            return response()->json([
                'success'=> true,
                'message'=>'success'
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message'=> 'Err',
                'errors'=>$e->getMessage()
            ]);
        }
    }

    function listSeller(){
        $data=toko::all();
        return response()->json($data);
    }
}
