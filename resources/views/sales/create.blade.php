@extends('layouts.app')

@section('title', 'Tambah Data Sales')

@section('content')
    <div class="p-5 mb-3">
        <form action="{{ url('sales') }}" method="post">
            {{ csrf_field() }}
            <div class="mb-3 row">
                <label for="name" class="col-2 col-form-label">Nama</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="John Doe">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="email" id="email" placeholder="email@mail.com">
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





