<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    protected $guarded = [''];
    protected $collection = 'categories';

    public function products(){
        return $this->hasMany(Product::class);
    }
}
