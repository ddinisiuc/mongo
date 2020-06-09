<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Infos extends Eloquent
{
    protected $guarded = [];

    protected $collection = 'infos';
}
