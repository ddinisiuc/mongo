<?php

namespace App\Filters;

Class ProductFilter
{
    protected $builder;
    protected $request;

    public function __construct($builder, $request){
        $this->builder = $builder;
        $this->request = $request->all();
    }



    //return dynamic filters
    public function filters(){
       return $this->request;
    }

    public function apply(){
        foreach($this->filters() as $key =>$value){
            // if(method_exists())
        };

        return $this->builder;
    }
}
