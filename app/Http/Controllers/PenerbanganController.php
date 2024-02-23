<?php

namespace App\Http\Controllers;

use App\Models\Penerbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            return redirect()->route('penerbangan.index')->with('errors', 'Penerbangan created failed');
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
    public function edit($id)
    {
        //mengambil data penerbangan per id
        $penerbangan = Penerbangan::find($id);
        //show data penerbangan per id
        return view('penerbangan.edit', compact('penerbangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        //cek jika ada file image
        if ($request->file('image')) {
            //store image
            $imagePath = $request->file('image')->store('public/images');
        } else {
            $imagePath = $request->image;
        }
        //delete image yang lama
        if ($request->image) {
            Storage::delete($request->image);
        }
        //update data penerbangan per id
        $penerbangan = Penerbangan::find($id);
        $penerbangan->name = $request->name;
        $penerbangan->price = $request->price;
        $penerbangan->image = $imagePath;
        $penerbangan->description = $request->description;
        
        if ($penerbangan->save()) {
            return redirect()->route('penerbangan.index')->with('success', 'Penerbangan updated successfully');
        } else {
            return redirect()->route('penerbangan.index')->with('errors', 'Penerbangan updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //mendelete data penerbangan per id
        $penerbangan = Penerbangan::find($id);
        $penerbangan->delete();
        return redirect()->route('penerbangan.index')->with('success', 'Penerbangan deleted successfully');
    }
}
