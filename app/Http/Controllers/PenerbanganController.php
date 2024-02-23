<?php

namespace App\Http\Controllers;

use App\Models\Penerbangan;
use Illuminate\Http\Request;

class PenerbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fungsinya untuk memanggil semua data penerbangan
        $penerbangan = Penerbangan::all(); //select * from penerbangan
        //passing data penerbangan ke views
        return view('penerbangan.index', compact('penerbangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //menampilkan halaman create.blade.php
        return view('penerbangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input validator
        $this->validate($request,[
            'name ' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',

        ]);
        //store image
        $imagePath = $request->file('image')->store('public/images');

        //request all store
        $penerbangan = Penerbangan::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        // dd($penerbangan);
        if ($penerbangan) {
            return redirect()->route('penerbangan.index')->with('success', 'Penerbangan created successfully');
        } else{
            return redirect()->route('penerbangan.index')->with('error', 'Penerbangan created failed');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbangan $penerbangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbangan $penerbangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerbangan $penerbangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbangan $penerbangan)
    {
        //
    }
}
