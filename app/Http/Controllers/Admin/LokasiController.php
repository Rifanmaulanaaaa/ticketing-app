<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasis = Lokasi::paginate(10);
        return view('admin.lokasi.index', compact('lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        Lokasi::create($validated);

        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        return view('admin.lokasi.show', compact('lokasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        $lokasi->update($validated);

        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil dihapus');
    }
}
