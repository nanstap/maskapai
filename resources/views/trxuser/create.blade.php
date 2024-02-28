@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                {{-- show message success --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                
                <div class="card">
                    <div class="card-header">
                        <h2>Transaksi</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <form action="{{ route('transaksi.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <table class="table table-responsive">
                                        <tr>
                                            <td>
                                                <select name="penerbangan_id" class="form-control">
                                                    <option value="">Pilih Penerbangan</option>
                                                    @php
                                                        $penerbangan = App\Models\Penerbangan::all();
                                                    @endphp
                                                    @foreach ($penerbangan as $i)
                                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
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
                                                <button type="submit" class="btn btn-primary">Pesan</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
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
                                    @foreach ($transaksi as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->listTransaksi->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>
                                                    <a href="{{ route('transaksi.destroy', $item->id) }}"
                                                        class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <h3>Total</h3>
                                        </td>
                                        <td>
                                            @php
                                                $total = 0;
                                                foreach ($transaksi as $item) {
                                                    $total += $item->total;
                                                }
                                                echo $total;
                                            @endphp</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <a href="{{route('transaksi.checkout')}}" class="btn btn-outline-primary">Checkout</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
