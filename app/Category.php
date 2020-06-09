<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    use CrudTrait;
    protected $guarded = [''];
    protected $collection = 'categories';

    public function products(){
        return $this->hasMany(Product::class);
    }
}
