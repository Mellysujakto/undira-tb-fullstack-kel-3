<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = Request::create('api/outlet', 'GET');
        $response = Route::dispatch($request);
        $products = json_decode($response->getContent(), true);
        return view('outlet.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.create');
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
            'nama_outlet' => 'required',
            'lokasi_outlet' => 'required',
            'nama_pj' => 'required'
        ]);
        $req = Request::create('api/outlet', 'POST', [], [], [], [], $request->getContent());
        $response = Route::dispatch($req);
        if ($response->status() >= 400) {
            return redirect('outlet')->with('failed', 'Outlet gagal ditambahkan');
        }
        return redirect('outlet')->with('success', 'Outlet berhasil ditambahkan');;
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
        $request = Request::create("api/outlet/$id", 'GET');
        $response = Route::dispatch($request);
        $product = json_decode($response->getContent());
        return view('outlet.edit', compact('product', 'id'));
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
            'nama_outlet' => 'required',
            'lokasi_outlet' => 'required',
            'nama_pj' => 'required'
        ]);
        $request->merge(['id' => $id]);
        $req = Request::create('api/outlet', 'PUT', [], [], [], [], $request->getContent());
        $response = Route::dispatch($req);
        if ($response->status() >= 400) {
            return redirect('outlet')->with('failed', 'Outlet gagal diperbarui');
        }
        return redirect('outlet')->with('success', 'Outlet berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::create("api/outlet/$id", 'DELETE');
        $response = Route::dispatch($request);
        if ($response->status() >= 400) {
            return redirect('outlet')->with('failed', 'Outlet gagal dihapus');
        }
        return redirect('outlet')->with('success', 'Outlet berhasil dihapus');
    }
}
