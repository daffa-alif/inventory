<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('inventory.index', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jenis_barang' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'status' => 'required|string|max:20',
            'harga_satuan' => 'required|integer|min:0'
        ]);

        // Create the new Barang record
        Barang::create($request->all());

        // Redirect back with a success message
        return redirect()->route('inventory.index')->with('success', 'Barang created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        // Validate the incoming data
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jenis_barang' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'status' => 'required|string|max:20',
            'harga_satuan' => 'required|integer|min:0'
        ]);

        // Update the existing Barang record
        $barang->update($request->all());

        // Redirect back with a success message
        return redirect()->route('inventory.index')->with('success', 'Barang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        // Delete the specified Barang record
        $barang->delete();

        // Redirect back with a success message
        return redirect()->route('inventory.index')->with('success', 'Barang deleted successfully.');
    }
}
