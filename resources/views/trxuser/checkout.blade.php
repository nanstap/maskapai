@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- show message erorr --}}
                @if (session('errors'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
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
                                    <form action="{{ route('transaksi.checkout_store') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        @foreach ($transaksi as $i)
                                            <tr>
                                                <input type="hidden" name="transaksi_id" value="{{ $i->id }}">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $i->listTransaksi->name }} <input type="hidden"
                                                        name="penerbangan_id" value="{{ $i->penerbangan_id }}"></td>
                                                <td>{{ $i->qty }}</td>
                                                <td>{{ $i->total }} <input type="hidden" name="total"
                                                        value="{{ $i->total }}"></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">Total</td>
                                            <td class="col-md-3">{{ $transaksi->sum('total') }}
                                                <input type="hidden" name="subtotal"
                                                    value="{{ $transaksi->sum('total') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Bayar</td>
                                            <td><input type="text" name="bayar" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <form action="{{ route('transaksi.checkout_store') }}" method="post">
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
