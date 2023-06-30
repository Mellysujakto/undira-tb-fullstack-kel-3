@extends('layouts.app')

@section('title','Data Sales')

@section('content')
<div class="p-4 mb-3">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
    <h2>Data Sales</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sales</th>
                    <th scope="col">HP</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($products as $product)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$product['nama_sales']}}</td>
                    <td>{{$product['no_hp']}}</td>
                    <td><a href="{{action('SalesController@edit', $product['id'])}}" class="btn btn-warning">Ubah</a>
                    </td>
                    <td>
                        <form action="{{action('SalesController@destroy',$product['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a name="" id="" class="btn btn-primary" href="sales/create" role="button">Tambah Data Sales</a>
    </div>

</div>
@endsection





