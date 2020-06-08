<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function create(Request $request){
        $create = Product::create($request->all());
        if(!$create){
            return response('error');
        }else{
            return redirect()->route('home');
        }
    }

    public function delete(Request $request){
        $delete = Product::destroy($request->product_id);
        if(!$delete){
            return response('error');
        }else{
            return redirect()->route('home');
        }
    }
}
