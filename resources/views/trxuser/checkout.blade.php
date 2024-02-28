@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- show message success --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>Checkout</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Penerbangan</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($transaksi as $i)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $i->listTransaksi->name }}</td>
                                            <td>{{ $i->qty }}</td>
                                            <td>{{ $i->total }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td class="col-md-3">{{ $transaksi->sum('total') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Bayar</td>
                                        <td><input type="text" name="bayar" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <form action="{{ route('transaksi.store') }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-primary">Checkout</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
