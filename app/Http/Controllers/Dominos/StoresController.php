<?php

namespace App\Http\Controllers\Dominos;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        // Read stores table 
        $stores = store::all();

        return view('admin.stores', compact('stores'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //Verify if it is a new store
        if($request['idstore']=="new"){
            // Validate form submission
            $valid = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'city' => 'required|string',
                'province' => 'required|string',
                'postal_code' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string'
            ]);

            //Insert new store in the table
            $store_rec = new store($valid);
            $store_rec->created_at = Carbon::now();
            $store_rec->updated_at = Carbon::now();
            $store_rec->save();
            return redirect('/dominos/stores')->
               with('success', 'Store has been added.');
        }else
        {
            // Validate form submission
            $valid = $request->validate([
                'idstore' => 'required|string',
                'name' => 'required|string',
                'address' => 'required|string',
                'city' => 'required|string',
                'province' => 'required|string',
                'postal_code' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string'
            ]);    

            //Update values for store
            $store_rec = store::find($valid['idstore']);
            $store_rec->name = $valid['name'];
            $store_rec->address = $valid['address'];
            $store_rec->city = $valid['city'];
            $store_rec->province = $valid['province'];
            $store_rec->postal_code = $valid['postal_code'];
            $store_rec->phone = $valid['phone'];
            $store_rec->email = $valid['email'];
            $store_rec->updated_at = Carbon::now();
            $store_rec->save();
            return redirect('/dominos/stores')->
               with('success', 'Store has been updated.');                      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

}

