<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemCRUDController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['items'] = item::orderBy('id','desc')->paginate(5);
    return view('masterdata.items.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('masterdata.items.create');
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
    'type' => 'required',
    'unit' => 'required'
    ]);
    $item = new item;
    $item->name = $request->name;
    $item->type = $request->type;
    $item->unit = $request->unit;
    $item->save();
    return redirect()->route('items.index')
    ->with('success','item has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\item  $item
    * @return \Illuminate\Http\Response
    */
    public function show(item $item)
    {
    return view('masterdata.items.show',compact('item'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\item  $item
    * @return \Illuminate\Http\Response
    */
    public function edit(item $item)
    {
    return view('masterdata.items.edit',compact('item'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\item  $item
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required',
        'type' => 'required',
        'unit' => 'required',
        
        
    ]);
    $item = item::find($id);
    $item->name = $request->name;
    $item->type = $request->type;
    $item->unit = $request->unit;
    
    $item->save();
    return redirect()->route('items.index')
    ->with('success','item Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\item  $item
    * @return \Illuminate\Http\Response
    */
    public function destroy(item $item)
    {
    $item->delete();
    return redirect()->route('items.index')
    ->with('success','item has been deleted successfully');
    }
}
