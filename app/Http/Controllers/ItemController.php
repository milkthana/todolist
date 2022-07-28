<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Item::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //Store item
        $newItem = new Item;
        $newItem->name = $request->name;
        $newItem->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $existingItem = Item::all();
        return view ('welcome', compact('existingItem'));
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
        //Update Item

        //Check if it exist
        $existingItem = Item::find( $id );

        if( $existingItem ){
            $existingItem->completed = $request->completed ? true : false;
            $existingItem->completed_at = $request->completed ? Carbon::now() : null;
            $existingItem->save();

            // return $existingItem;
            return redirect('/');
        }
        //Else can't find task
        return  "This task is missing.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Item

        //Check if it exist
        $existingItem = Item::find( $id );

        if( $existingItem ){
            $existingItem->delete();

            return redirect('/');
        }
        //Else can't find task
        return "This task is missing.";
    }
}
