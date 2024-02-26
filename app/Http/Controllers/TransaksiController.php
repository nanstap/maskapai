<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Penerbangan;
use Illuminate\Http\Request;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //passing data transaksi ke views
        $penerbangan = Penerbangan::all(); //select * from penerbangan
        $transaksi = Transaksi::all(); //select * from transaksi
        return view('trxuser.index', compact('transaksi', 'penerbangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //passing data transaksi ke views
        $penerbangan = Penerbangan::all(); //select * from penerbangan
        $transaksi = Transaksi::all(); //select * from transaksi
        return view('trxuser.create', compact('transaksi', 'penerbangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi  
        $request->validate([
            'penerbangan_id' => 'required',
            'qty' => 'required',
           
        ]);
       
        // $input = $request->all();
        //menetapkan harga jika qty lebih dari 1
        $penerbangan = Penerbangan::find($request->penerbangan_id);
        
        $total = $penerbangan->price * $request->qty;
        //menyimpan data ke dalam tabel transaksi
        // $trx = Transaksi::create([
        //     'penerbangan_id' => $request->penerbangan_id,
        //     'user_id' => Auth::user()->id,
        //     'status' => 'unpaid',
        //     'qty' => $request->qty,
        //     'adm_conf' => 'Process',
        //     'total' => $total,
        // ]);
        $trx = new Transaksi(); 
        $trx->penerbangan_id = $request->penerbangan_id;
        $trx->user_id = 1; 
        $trx->qty = $request->qty; 
        $trx->status = 'unpaid'; 
        $trx->adm_conf = 'Process'; 
        $trx->total = $total;
        $trx->save(); 
        
        $transaksi = Trasaksi::all();
        // dd($trx);
        return view('trxuser.create',compact('transaksi', 'total'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
