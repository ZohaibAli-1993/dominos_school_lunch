<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Index controller for the home page
 */
class IndexController extends Controller
{
    /**
     * index function points to the index page of the site
     * @return index view
     */
    public function index()
    {
        return view('index');
    }
}
