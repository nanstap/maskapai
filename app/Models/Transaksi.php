<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penerbangan;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function listTransaksi()
    {
        return $this->belongsTo(Penerbangan::class,'penerbangan_id','id');
    }
}
