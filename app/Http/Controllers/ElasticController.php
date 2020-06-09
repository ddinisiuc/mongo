<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Infos;
use Illuminate\Http\Request;
use App\Traits\ElasticBuilder;
use App\Filters\ProductFilter;
use Illuminate\Validation\Rules\In;

class ElasticController extends Controller
{
    use ElasticBuilder;

    public function index(Request $request){
//        $product =  Product::create([
//             'title' => 'many categories',
//             'description' => 'hasMany',
//
//         ]);
//        $product = Product::where('_id', '5ede2d505a67000003003a9f')->with('infos')->first();
//
//        $info = Infos::create([ 'seller'=> [
//            'name'=>'Dinisiuc',
//            'price'=> rand(0, 500)
//        ], 'variations' => [
//            'color'=>'red',
//            'size'=> 'XL'
//        ],
//        'product_id' => $product->_id
//        ]);
//
//        $product->infos()->save($info);
//
//        dump($product);

//        $product->infos()->unset();
//
//        $product = Product::with('category');
//        $category = Category::get();
//        $product = (new ProductFilter($product, $request))->apply()->get();
//        return view('home', compact('product', 'category'));
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
