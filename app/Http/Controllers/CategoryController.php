<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function create(Request $request){
        $create = Category::create($request->all());

        if(!$create){
            return response('error');
        }else{
            return redirect()->route('home');
        }
    }

    public function delete(Request $request){
        $delete = Category::destroy($request->category_id);
        if(!$delete){
            return response('error');
        }else{
            return redirect()->route('home');
        }
    }
}
