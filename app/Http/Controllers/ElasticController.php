<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        $product = Product::with('category');
        $category = Category::get();
        $product = (new ProductFilter($product, $request))->apply()->get();
        // dd($product->last());
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
