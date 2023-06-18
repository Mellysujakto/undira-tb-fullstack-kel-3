@extends('layouts.header')

@section('title','Tambah Data Outlet')

@section('konten')
<div class="p-5 mb-3">
    <div class="container">
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
        
        <form action="{{url('outlet')}}" method="post">
            {{csrf_field()}}
            <div class="mb-3 row">
                <label for="nama_outlet" class="col-2 col-form-label">Nama Outlet</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="nama_outlet" id="nama_outlet" placeholder="Nama Outlet">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="lokasi_outlet" class="col-2 col-form-label">Lokasi Outlet</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="lokasi_outlet" id="lokasi_outlet" placeholder="Lokasi Outlet">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_pj" class="col-2 col-form-label">Nama Penanggung Jawab</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="nama_pj" id="nama_pj" placeholder="Nama Penanggung Jawab">
                </div>
            </div>


            <div class="mb-3 row">
                <div class="">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
