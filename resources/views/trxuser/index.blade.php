@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-3">
                {{-- show message succes --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>Transaksi</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-responsive">
                                    <tr>
                                        <td>
                                            <select name="penerbangan_id"  class="form-control">
                                                <option value="">Pilih Penerbangan</option>
                                                @foreach ($penerbangan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" name="qty" class="form-control" placeholder="Qty">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary">Pesan</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    </div>  
                    
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Transaksi</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Nama Penerbangan</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection