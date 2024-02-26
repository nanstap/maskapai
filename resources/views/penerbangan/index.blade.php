@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- show message succes --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card">

                    <div class="card-header">
                        <h2>Penerbangan</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('penerbangan.create') }}" class="btn btn-outline-primary">Tambah</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Nama Penerbangan</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($penerbangan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img src="{{ Storage::url($item->image) }}" alt="" width="100px">
                                            </td>
                                            <td>
                                                <a href="{{ route('penerbangan.edit', $item->id) }}"
                                                    class="btn btn-outline-success">Edit</a>
                                                <a href="{{ route('penerbangan.destroy', $item->id) }}"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
