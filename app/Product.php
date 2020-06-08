<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $guarded = [''];
    protected $collection = 'products';

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function infos(){
        return $this->embedsOne(Infos::Class, 'infos');
    }
}
