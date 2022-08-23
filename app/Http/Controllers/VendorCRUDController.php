<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorCRUDController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['vendors'] = vendor::orderBy('id','desc')->paginate(5);
    return view('masterdata.vendors.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.vendors.create');
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
    $vendor = new vendor;
    $vendor->name = $request->name;
    $vendor->pic = $request->pic;
    $vendor->email = $request->email;
    $vendor->phone = $request->phone;
    $vendor->address = $request->address;
    $vendor->city = $request->city;
    $vendor->province = $request->province;
    $vendor->post_code = $request->post_code;
    $vendor->save();
    return redirect()->route('vendors.index')
    ->with('success','vendor has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\vendor  $vendor
    * @return \Illuminate\Http\Response
    */
    public function show(vendor $vendor)
    {
    return view('masterdata.vendors.show',compact('vendor'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\vendor  $vendor
    * @return \Illuminate\Http\Response
    */
    public function edit(vendor $vendor)
    {
    return view('masterdata.vendors.edit',compact('vendor'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\vendor  $vendor
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
    $vendor = vendor::find($id);
    $vendor->name = $request->name;
    $vendor->pic = $request->pic;
    $vendor->email = $request->email;
    $vendor->phone = $request->phone;
    $vendor->address = $request->address;
    $vendor->city = $request->city;
    $vendor->province = $request->province;
    $vendor->post_code = $request->post_code;
    $vendor->save();
    return redirect()->route('vendors.index')
    ->with('success','vendor Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\vendor  $vendor
    * @return \Illuminate\Http\Response
    */
    public function destroy(vendor $vendor)
    {
    $vendor->delete();
    return redirect()->route('vendors.index')
    ->with('success','vendor has been deleted successfully');
    }
}
