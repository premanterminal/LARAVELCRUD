<?php

namespace App\Http\Controllers;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseCRUDController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['warehouses'] = warehouse::orderBy('id','desc')->paginate(5);
    return view('masterdata.warehouses.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.warehouses.create');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    $request->validate([
    'name' => 'required',
    'pic' => 'required',
    'email' => 'required',
    'phone' => 'required',
    'address' => 'required',
    'city' => 'required',
    'province' => 'required',
    'post_code' => 'required'
    ]);
    $warehouse = new warehouse;
    $warehouse->name = $request->name;
    $warehouse->pic = $request->pic;
    $warehouse->email = $request->email;
    $warehouse->phone = $request->phone;
    $warehouse->address = $request->address;
    $warehouse->city = $request->city;
    $warehouse->province = $request->province;
    $warehouse->post_code = $request->post_code;
    $warehouse->save();
    return redirect()->route('warehouses.index')
    ->with('success','warehouse has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\warehouse  $warehouse
    * @return \Illuminate\Http\Response
    */
    public function show(warehouse $warehouse)
    {
    return view('masterdata.warehouses.show',compact('warehouse'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\warehouse  $warehouse
    * @return \Illuminate\Http\Response
    */
    public function edit(warehouse $warehouse)
    {
    return view('masterdata.warehouses.edit',compact('warehouse'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\warehouse  $warehouse
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required',
        'pic' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'province' => 'required',
        'post_code' => 'required'
    ]);
    $warehouse = warehouse::find($id);
    $warehouse->name = $request->name;
    $warehouse->pic = $request->pic;
    $warehouse->email = $request->email;
    $warehouse->phone = $request->phone;
    $warehouse->address = $request->address;
    $warehouse->city = $request->city;
    $warehouse->province = $request->province;
    $warehouse->post_code = $request->post_code;
    $warehouse->save();
    return redirect()->route('warehouses.index')
    ->with('success','warehouse Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\warehouse  $warehouse
    * @return \Illuminate\Http\Response
    */
    public function destroy(warehouse $warehouse)
    {
    $warehouse->delete();
    return redirect()->route('warehouses.index')
    ->with('success','warehouse has been deleted successfully');
    }
}
