<?php


namespace App\Http\Controllers\API;


use App\Outlet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OutletAPIController extends Controller
{
public function list()
{
$list = Outlet::all();
return response()->json($list, 200);
}


public function getById($id)
{
$detail = Outlet::find($id);
return response()->json($detail, 200);
}




public function create(Request $request)
{
$validator = Validator::make($request->all(), [
'nama_outlet' => 'required',
'lokasi_outlet' => 'required',
'nama_pj' => 'required',
]);
if ($validator->fails()) {
return response()->json('nama_outlet, lokasi_outlet, and nama_pj are required', 400);
}
$result = Outlet::create($request->all());
return response()->json($result, 201);
}




public function update(Request $request)
{
$id = $request->input('id');
$validator = Validator::make($request->all(), [
'id' => 'required',
'nama_outlet' => 'required',
'lokasi_outlet' => 'required',
'nama_pj' => 'required',
]);
if ($validator->fails()) {
return response()->json('id, nama_outlet, lokasi_outlet, and nama_pj are required', 400);
}


Outlet::where('id', $id)
->update($request->all());
$result = Outlet::find($id);


return response()->json($result, 200);
}




public function delete($id)
{
Outlet::where('id', $id)->delete();
return response()->json("Data Barang with id $id already deleted", 200);
}
}





