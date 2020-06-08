<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::get();
        $category = Category::get();
        $client = ClientBuilder::create()->build();
       
        return view('home', compact('product', 'category'));
    }
}
