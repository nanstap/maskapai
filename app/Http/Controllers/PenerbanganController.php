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
        abort('404');
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
    // Validate request
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Find the Penerbangan
    $penerbangan = Penerbangan::find($id);

    // Check if there is a new image
    if ($request->hasFile('image')) {
        // Store new image
        $imagePath = $request->file('image')->store('public/images');

        // Delete old image if it exists
        if ($penerbangan->image) {
            Storage::delete($penerbangan->image);
        }

        // Update image path
        $penerbangan->image = $imagePath;
    }

    // Update other fields
    $penerbangan->name = $request->name;
    $penerbangan->price = $request->price;
    $penerbangan->description = $request->description;
    
    // Save the updated Penerbangan
    $penerbangan->save();

    // Redirect with success message
    return redirect()->route('penerbangan.index')->with('success', 'Penerbangan updated successfully');
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
