<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Infos;
use Illuminate\Http\Request;
use App\Traits\ElasticBuilder;
use App\Filters\ProductFilter;

class ElasticController extends Controller
{
    use ElasticBuilder;

    public function index(Request $request){
        // Product::create([
        //     'title' => 'many categories',
        //     'description' => 'hasMany',
        //     'infos' =>[
        //         'seller'=>[
        //                 'name'=>'Dinisiuc',
        //                 'price'=> '1000'
        //         ],
        //         'variations'=>[
        //             'color'=>'red',
        //             'size'=> 'XL'
        //         ]
        //     ]
        // ]);
        // dd();
        $or = Product::where('_id', '5ede0b18cd61000072005552')->first();
        dd($or->infos);
        $product = Product::with('category');
        $category = Category::get();
        $product = (new ProductFilter($product, $request))->apply()->get();
         dd($product->last());
        return view('home', compact('product', 'category'));
    }

    public function search(Request $request){
        $query = [
            'index' => 'categories',
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $request->search,
                        'fuzziness' => 'AUTO',
                        'fields' => ['title', 'description']
                    ]
                ]
            ]
        ];
        $search = $this->client()->search($query);

        return response($search['hits']['hits']);
    }

}
