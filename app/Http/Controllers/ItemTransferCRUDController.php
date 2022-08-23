<?php

namespace App\Http\Controllers;
use App\Models\ItemTransfer;
use Illuminate\Http\Request;

class ItemTransferCRUDController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['itemtransfers'] = itemtransfer::orderBy('id','desc')->paginate(5);
    return view('masterdata.itemtransfers.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.itemtransfers.create');
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
    $itemtransfer = new itemtransfer;
    $itemtransfer->item_id = $request->item_id;
    $itemtransfer->item_name = $request->item_name;
    $itemtransfer->type = $request->type;
    $itemtransfer->unit = $request->unit;
    $itemtransfer->stock = $request->stock;
    $itemtransfer->warehouse = $request->warehouse;
    $itemtransfer->po_id = $request->po_id;
    $itemtransfer->save();
    return redirect()->route('itemtransfers.index')
    ->with('success','itemtransfer has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\itemtransfer  $itemtransfer
    * @return \Illuminate\Http\Response
    */
    public function show(itemtransfer $itemtransfer)
    {
    return view('masterdata.itemtransfers.show',compact('itemtransfer'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\itemtransfer  $itemtransfer
    * @return \Illuminate\Http\Response
    */
    public function edit(itemtransfer $itemtransfer)
    {
    return view('masterdata.itemtransfers.edit',compact('itemtransfer'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\itemtransfer  $itemtransfer
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
    $itemtransfer = itemtransfer::find($id);
    $itemtransfer->item_id = $request->item_id;
    $itemtransfer->item_name = $request->item_name;
    $itemtransfer->type = $request->type;
    $itemtransfer->unit = $request->unit;
    $itemtransfer->stock = $request->stock;
    $itemtransfer->warehouse = $request->warehouse;
    $itemtransfer->po_id = $request->po_id;
    $itemtransfer->save();
    return redirect()->route('itemtransfers.index')
    ->with('success','itemtransfer Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\itemtransfer  $itemtransfer
    * @return \Illuminate\Http\Response
    */
    public function destroy(itemtransfer $itemtransfer)
    {
    $itemtransfer->delete();
    return redirect()->route('itemtransfers.index')
    ->with('success','itemtransfer has been deleted successfully');
    }
}
