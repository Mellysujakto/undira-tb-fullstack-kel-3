<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Outlet::all()->toArray();
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
        $product = $this->validate(request(), [
            'nama_outlet' => 'required',
            'lokasi_outlet' => 'required',
            'nama_pj' => 'required'
            ]);
            Outlet::create($product);
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
        $product = Outlet::find($id);
        return view('outlet.edit',compact('product','id'));
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
        $product = Outlet::find($id);
        $this->validate(request(), [
        'nama_outlet' => 'required',
        'lokasi_outlet' => 'required',
        'nama_pj' => 'required'
        ]);
        $product->nama_outlet = $request->get('nama_outlet');
        $product->lokasi_outlet = $request->get('lokasi_outlet');
        $product->nama_pj = $request->get('nama_pj');
        $product->save();
        return redirect('outlet')->with('success','Outlet berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Outlet::find($id);
        $product->delete();
        return redirect('outlet')->with('success','Outlet berhasil dihapus');
    }
}
