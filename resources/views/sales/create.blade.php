@extends('layouts.app')

@section('title','Tambah Data Sales')

@section('content')
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

        <form action="{{url('sales')}}" method="post">
            {{csrf_field()}}
            <div class="mb-3 row">
                <label for="nama_sales" class="col-2 col-form-label">Nama Sales</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="nama_sales" id="nama_sales" placeholder="John Doe">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_hp" class="col-2 col-form-label">HP</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="HP">
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





