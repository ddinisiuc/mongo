<?php
namespace App\Traits;

use Elasticsearch\ClientBuilder;

trait ElasticBuilder{

    public function client(){
        return ClientBuilder::create()->build();
    }
}
