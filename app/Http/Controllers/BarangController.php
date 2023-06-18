<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Barang::all()->toArray();
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
        $product = $this->validate(request(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga_barang' => 'required'
            ]);
            Barang::create($product);
            return redirect('barang')->with('success', 'Barang berhasil ditambahkan');;
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
        $product = Barang::find($id);
        return view('barang.edit',compact('product','id'));
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
        $product = Barang::find($id);
        $this->validate(request(), [
        'kode_barang' => 'required',
        'nama_barang' => 'required',
        'stok' => 'required',
        'harga_barang' => 'required'
        ]);
        $product->kode_barang = $request->get('kode_barang');
        $product->nama_barang = $request->get('nama_barang');
        $product->stok = $request->get('stok');
        $product->harga_barang = $request->get('harga_barang');
        $product->save();
        return redirect('barang')->with('success','Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Barang::find($id);
        $product->delete();
        return redirect('barang')->with('success','Barang berhasil dihapus');
    }
}
