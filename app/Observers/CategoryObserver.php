<?php

namespace App\Observers;

use App\Category;
use App\Traits\ElasticBuilder;

class CategoryObserver
{
    use ElasticBuilder;
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        $es = [
            'index' => 'categories',
            'type' =>'categories',
            'id' => $category->_id,
            'body'=> [
                'title' => $category->title,
                'description' => $category->description
            ]
        ];
        $index = $this->client()->index($es);

    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        $delete = [
            'index' => 'categories',
            'id'    => $category->_id,
        ];
        $response = $this->client()->delete($delete);
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
      //
    }
}
