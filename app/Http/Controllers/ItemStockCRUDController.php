<?php

namespace App\Http\Controllers;
use App\Models\ItemStock;
use Illuminate\Http\Request;

class ItemStockCRUDController extends Controller
{
    //
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['itemstocks'] = itemstock::orderBy('id','desc')->paginate(5);
    return view('masterdata.itemstocks.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.itemstocks.create');
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
    $itemstock = new itemstock;
    $itemstock->item_id = $request->item_id;
    $itemstock->item_name = $request->item_name;
    $itemstock->type = $request->type;
    $itemstock->unit = $request->unit;
    $itemstock->stock = $request->stock;
    $itemstock->warehouse = $request->warehouse;
    $itemstock->po_id = $request->po_id;
    $itemstock->save();
    return redirect()->route('itemstocks.index')
    ->with('success','itemstock has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\itemstock  $itemstock
    * @return \Illuminate\Http\Response
    */
    public function show(itemstock $itemstock)
    {
    return view('masterdata.itemstocks.show',compact('itemstock'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\itemstock  $itemstock
    * @return \Illuminate\Http\Response
    */
    public function edit(itemstock $itemstock)
    {
    return view('masterdata.itemstocks.edit',compact('itemstock'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\itemstock  $itemstock
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
    $itemstock = itemstock::find($id);
    $itemstock->item_id = $request->item_id;
    $itemstock->item_name = $request->item_name;
    $itemstock->type = $request->type;
    $itemstock->unit = $request->unit;
    $itemstock->stock = $request->stock;
    $itemstock->warehouse = $request->warehouse;
    $itemstock->po_id = $request->po_id;
    $itemstock->save();
    return redirect()->route('itemstocks.index')
    ->with('success','itemstock Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\itemstock  $itemstock
    * @return \Illuminate\Http\Response
    */
    public function destroy(itemstock $itemstock)
    {
    $itemstock->delete();
    return redirect()->route('itemstocks.index')
    ->with('success','itemstock has been deleted successfully');
    }
}
