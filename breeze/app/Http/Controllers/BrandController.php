<?php

namespace App\Http\Controllers;

use App\Models\toko;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = toko::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nm_toko'=>'required',
            'desk_toko'=>'required',
            'location' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:50',
        ]);

        try {
            $toko = toko::create([
                'nm_toko' => $request->nm_toko,
                'desk_toko' => $request->desk_toko,
                'location' => $request->location,
                'kontak' => $request->kontak,
            ]);

            // Return a success response
            return response()->json([
                'message' => 'Toko created successfully',
                'data' => $toko
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            // Return an error response if something goes wrong
            return response()->json([
                'message' => 'Failed to create Toko',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
        // Validate the incoming request
        $request->validate([
            'nm_toko' => 'required|string|max:255',
            'desk_toko' => 'required|string|max:1000',
            'location' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:50',
        ]);

        try {
            // Find the toko record by ID
            $toko = toko::findOrFail($id);

            // Update the toko record with validated data
            $toko->update([
                'nm_toko' => $request->nm_toko,
                'desk_toko' => $request->desk_toko,
                'location' => $request->location,
                'kontak' => $request->kontak,
            ]);

            // Return a success response
            return response()->json([
                'message' => 'Toko updated successfully',
                'data' => $toko
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Return an error response if something goes wrong
            return response()->json([
                'message' => 'Failed to update Toko',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $toko=toko::find($id);
            $toko->delete();
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
}
