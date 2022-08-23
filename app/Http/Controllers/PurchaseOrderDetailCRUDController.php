<?php

namespace App\Http\Controllers;
use App\Models\PurchaseOrderDetail;
use Illuminate\Http\Request;

class PurchaseOrderDetailCRUDController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['purchaseorderdetails'] = purchaseorderdetail::orderBy('id','desc')->paginate(5);
    return view('masterdata.purchaseorderdetails.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.purchaseorderdetails.create');
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
    $purchaseorderdetail = new purchaseorderdetail;
    $purchaseorderdetail->item_id = $request->item_id;
    $purchaseorderdetail->item_name = $request->item_name;
    $purchaseorderdetail->type = $request->type;
    $purchaseorderdetail->unit = $request->unit;
    $purchaseorderdetail->stock = $request->stock;
    $purchaseorderdetail->warehouse = $request->warehouse;
    $purchaseorderdetail->po_id = $request->po_id;
    $purchaseorderdetail->save();
    return redirect()->route('purchaseorderdetails.index')
    ->with('success','purchaseorderdetail has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\purchaseorderdetail  $purchaseorderdetail
    * @return \Illuminate\Http\Response
    */
    public function show(purchaseorderdetail $purchaseorderdetail)
    {
    return view('masterdata.purchaseorderdetails.show',compact('purchaseorderdetail'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\purchaseorderdetail  $purchaseorderdetail
    * @return \Illuminate\Http\Response
    */
    public function edit(purchaseorderdetail $purchaseorderdetail)
    {
    return view('masterdata.purchaseorderdetails.edit',compact('purchaseorderdetail'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\purchaseorderdetail  $purchaseorderdetail
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
    $purchaseorderdetail = purchaseorderdetail::find($id);
    $purchaseorderdetail->item_id = $request->item_id;
    $purchaseorderdetail->item_name = $request->item_name;
    $purchaseorderdetail->type = $request->type;
    $purchaseorderdetail->unit = $request->unit;
    $purchaseorderdetail->stock = $request->stock;
    $purchaseorderdetail->warehouse = $request->warehouse;
    $purchaseorderdetail->po_id = $request->po_id;
    $purchaseorderdetail->save();
    return redirect()->route('purchaseorderdetails.index')
    ->with('success','purchaseorderdetail Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\purchaseorderdetail  $purchaseorderdetail
    * @return \Illuminate\Http\Response
    */
    public function destroy(purchaseorderdetail $purchaseorderdetail)
    {
    $purchaseorderdetail->delete();
    return redirect()->route('purchaseorderdetails.index')
    ->with('success','purchaseorderdetail has been deleted successfully');
    }
}
