<?php

namespace App\Http\Controllers\Dominos;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CategoriesController extends Controller
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
     * category a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // Read categories table 
        $categories = Category::all();

        return view('admin.categories', compact('categories'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Verify if it is a new category
        if($request['idcategory']=="new"){
            // Validate form submition
            $valid = $request->validate([
                'category' => 'required|string'
            ]);

            //Insert new category in the table
            $category_rec = new Category($valid);
            $category_rec->created_at = Carbon::now();
            $category_rec->updated_at = Carbon::now();
            $category_rec->save();
            return redirect('/dominos/categories')->
               with('success', 'Category has been added.');
        }else
        {
            // Validate form submission
            $valid = $request->validate([
                'idcategory' => 'required|integer',
                'category' => 'required|string'
            ]);    

            //Update values for category
            $category_rec = Category::find($valid['idcategory']);
            $category_rec->category = $valid['category'];
            $category_rec->updated_at = Carbon::now();
            $category_rec->save();
            return redirect('/dominos/categories')->
               with('success', 'Category has been updated.');                      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
