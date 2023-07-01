@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold ">Sales Visit</h1>
            <h1 class="display-5 fw-bold "> Dashboard & Management</h1>
            <p class="fs-4">Selamat datang di dashboard dan management aplikasi Sales Visit berbasis website. Akses menu
                yang ingin kamu gunakan melalui navigasi yang ada!</p>
            <button class="btn btn-primary btn-lg" type="button" onclick="window.location.href='#data'">Cek Data</button>
        </div>
    </div>

    <div class="p-5 mb-4 rounded-3" id="data">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Sales</p>
                            <footer class="blockquote-footer">11 <cite title="Source title">Personel</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Barang</p>
                            <footer class="blockquote-footer">211 <cite title="Source title">Jenis</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Outlet</p>
                            <footer class="blockquote-footer">8 <cite title="Source title">Outlet</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
