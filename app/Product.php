<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    use CrudTrait;

    protected $guarded = [''];
    protected $collection = 'products';
    protected $connection = 'mongodb';

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function infos(){
        return $this->hasMany(Infos::Class, 'infos', 'product_id');
    }
}
