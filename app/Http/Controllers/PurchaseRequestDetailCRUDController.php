<?php

namespace App\Http\Controllers;
use App\Models\PurchaseRequestDetail;
use Illuminate\Http\Request;

class PurchaseRequestDetailCRUDController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['purchaserequestdetails'] = purchaserequestdetail::orderBy('id','desc')->paginate(5);
    return view('masterdata.purchaserequestdetails.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.purchaserequestdetails.create');
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
    'item_id' => 'required',
    'item_name' => 'required',
    'type' => 'required',
    'unit' => 'required',
    'stock' => 'required',
    'warehouse_id' => 'required',
    'po_id' => 'required'
    ]);
    $purchaserequestdetail = new purchaserequestdetail;
    $purchaserequestdetail->item_id = $request->item_id;
    $purchaserequestdetail->item_name = $request->item_name;
    $purchaserequestdetail->type = $request->type;
    $purchaserequestdetail->unit = $request->unit;
    $purchaserequestdetail->stock = $request->stock;
    $purchaserequestdetail->warehouse = $request->warehouse;
    $purchaserequestdetail->po_id = $request->po_id;
    $purchaserequestdetail->save();
    return redirect()->route('purchaserequestdetails.index')
    ->with('success','purchaserequestdetail has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\purchaserequestdetail  $purchaserequestdetail
    * @return \Illuminate\Http\Response
    */
    public function show(purchaserequestdetail $purchaserequestdetail)
    {
    return view('masterdata.purchaserequestdetails.show',compact('purchaserequestdetail'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\purchaserequestdetail  $purchaserequestdetail
    * @return \Illuminate\Http\Response
    */
    public function edit(purchaserequestdetail $purchaserequestdetail)
    {
    return view('masterdata.purchaserequestdetails.edit',compact('purchaserequestdetail'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\purchaserequestdetail  $purchaserequestdetail
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
        'item_id' => 'required',
        'item_name' => 'required',
        'type' => 'required',
        'unit' => 'required',
        'stock' => 'required',
        'warehouse_id' => 'required',
        'po_id' => 'required'
    ]);
    $purchaserequestdetail = purchaserequestdetail::find($id);
    $purchaserequestdetail->item_id = $request->item_id;
    $purchaserequestdetail->item_name = $request->item_name;
    $purchaserequestdetail->type = $request->type;
    $purchaserequestdetail->unit = $request->unit;
    $purchaserequestdetail->stock = $request->stock;
    $purchaserequestdetail->warehouse = $request->warehouse;
    $purchaserequestdetail->po_id = $request->po_id;
    $purchaserequestdetail->save();
    return redirect()->route('purchaserequestdetails.index')
    ->with('success','purchaserequestdetail Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\purchaserequestdetail  $purchaserequestdetail
    * @return \Illuminate\Http\Response
    */
    public function destroy(purchaserequestdetail $purchaserequestdetail)
    {
    $purchaserequestdetail->delete();
    return redirect()->route('purchaserequestdetails.index')
    ->with('success','purchaserequestdetail has been deleted successfully');
    }
}
