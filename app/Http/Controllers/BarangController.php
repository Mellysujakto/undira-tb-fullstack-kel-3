<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = Request::create('api/barang', 'GET');
        // $request->headers->set('Authorization', 'Bearer' . 'Z2nAm1p9KKKQYqgsMfENevBXkFP8HBazRiXO90tMiuyWX9V3FIf5gZiD1fLM');
        $response = Route::dispatch($request);
        $products = json_decode($response->getContent(), true);
        return view('barang.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga_barang' => 'required'
        ]);
        $req = Request::create('api/barang', 'POST', [], [], [], [], $request->getContent());
        $response = Route::dispatch($req);
        if ($response->status() >= 400) {
            return redirect('barang')->with('failed', 'Barang gagal ditambahkan');
        }
        return redirect('barang')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request = Request::create("api/barang/$id", 'GET');
        $response = Route::dispatch($request);
        $product = json_decode($response->getContent());
        return view('barang.edit', compact('product', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga_barang' => 'required'
        ]);
        $request->merge(['id' => $id]);
        $req = Request::create('api/barang', 'PUT', [], [], [], [], $request->getContent());
        $response = Route::dispatch($req);
        if ($response->status() >= 400) {
            return redirect('barang')->with('failed', 'Barang gagal diperbarui');
        }
        return redirect('barang')->with('success', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::create("api/barang/$id", 'DELETE');
        $response = Route::dispatch($request);
        if ($response->status() >= 400) {
            return redirect('barang')->with('failed', 'Barang gagal dihapus');
        }
        return redirect('barang')->with('success', 'Barang berhasil dihapus');
    }
}
