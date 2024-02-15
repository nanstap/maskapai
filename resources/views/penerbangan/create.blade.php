@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header">{{ __('Tambah Penerbangan') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form enctype="multipart/form-data" action="#" method="post">
                            @csrf
                            @method('POST')
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" class="form-control" name="name"></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><input type="text" class="form-control" name="price"></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><input type="file" class="form-control" name="image"></td>
                                </tr>
                                <tr>
                                    <td>Desription</td>
                                    <td><input type="text" class="form-control" name="description"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><button class="btn btn-outline-success">Save</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
