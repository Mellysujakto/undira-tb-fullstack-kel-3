<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Outlet;
use App\Models\Sales;
use App\Models\SurveyStock;
use Illuminate\Http\Request;

class SurveyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = SurveyStock::all()->toArray();
        return view('survey.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all()->toArray();
        $outlet = Outlet::all()->toArray();
        $sales = Sales::all()->toArray();
        return view('survey.create',compact('barang','outlet','sales'));
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
            'nama_sales' => 'required',
            'nama_outlet' => 'required',
            'nama_barang' => 'required',
            'jumlah_stok' => 'required',
            'jumlah_display' => 'required',
            'visit_datetime' => 'required'
            ]);
            SurveyStock::create($product);
            return redirect('survey')->with('success', 'Data survey berhasil ditambahkan');;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = SurveyStock::find($id);
        $product->delete();
        return redirect('survey')->with('success','Survey berhasil dihapus');
    }
}
