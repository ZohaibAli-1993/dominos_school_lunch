<?php

namespace App\Http\Controllers\Dominos;

use App\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Dominos;

use App\Category;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $menu = MenuItem::all(); 

        $category = Category::all();
          
        return view('schools.menu', compact('category', 'menu'));

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
     * menuitem a newly created resource in storage.
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
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        // Read menuitems table 
        $menuitems = menuitem::all();

        return view('admin.menuitems', compact('menuitems'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //Verify if it is a new menuitem
        if($request['iditem']=="new"){
            // Validate form submission
            $valid = $request->validate([
                'item_name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|string',
                'nutrition_facts' => 'required|string',
                'idcategory' => 'required|integer',
                'image' => 'required|string'
            ]);

            //Insert new menuitem in the table
            $menuitem_rec = new menuitem($valid);
            $menuitem_rec->created_at = Carbon::now();
            $menuitem_rec->updated_at = Carbon::now();
            $menuitem_rec->save();
            return redirect('/dominos/menuitems')->
               with('success', 'Menu Item has been added.');
        }else
        {
            // Validate form submission
            $valid = $request->validate([
                'iditem' => 'required|integer',
                'item_name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|string',
                'nutrition_facts' => 'required|string',
                'idcategory' => 'required|integer',
                'image' => 'required|string'
            ]);    

            //Update values for menuitem
            $menuitem_rec = menuitem::find($valid['iditem']);
            $menuitem_rec->item_name = $valid['item_name'];
            $menuitem_rec->description = $valid['description'];
            $menuitem_rec->price = $valid['price'];
            $menuitem_rec->nutrition_facts = $valid['nutrition_facts'];
            $menuitem_rec->idcategory = $valid['idcategory'];
            $menuitem_rec->image = $valid['image'];
            $menuitem_rec->updated_at = Carbon::now();
            $menuitem_rec->save();
            return redirect('/dominos/menuitems')->
               with('success', 'Menu Item has been updated.');                      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }
}
