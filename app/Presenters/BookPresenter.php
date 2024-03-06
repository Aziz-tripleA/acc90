<?php

namespace App\Presenters;

use App\Models\Book;
use Illuminate\Support\Arr;

class BookPresenter extends BasePresenter
{
    public function paginate($models, $sorting_options = [])
    {
        $default = Book::getSortingOptions(false, $sorting_options)->first();
        $sort_by = $this->getSortBy($default['sort_by']);
        $sort_dir = $this->getSortDir($default['sort_dir']);

        switch ($sort_by) {
            case 'type_name':
                $models = $models->sortBy("type.$sort_by", SORT_REGULAR, $sort_dir)->values()->all();             
                break;
            case 'cat_name':
                $models = $models->sortBy("category.$sort_by", SORT_REGULAR, $sort_dir)->values()->all();             
                break;
            case 'publish_name':
                $models = $models->sortBy("publisher.$sort_by", SORT_REGULAR, $sort_dir)->values()->all();             
                break;
            case 'author_name':
                $models = $models->sortBy("author.$sort_by", SORT_REGULAR, $sort_dir)->values()->all();             
                break;
            case 'translator_name':
                $models = $models->sortBy("translator.$sort_by", SORT_REGULAR, $sort_dir)->values()->all();             
                break;
            case 'item_code':
                $models = $models->sortBy("$sort_by", SORT_REGULAR, $sort_dir)->values()->all();             
                break;
            case 'item_name':
                $models = $models->sortBy("$sort_by", SORT_REGULAR, $sort_dir)->values()->all();             
                break;
            default:
                    $models = $models->sortBy('created_at', SORT_REGULAR, 'desc')->values()->all();
                
                break;
        }

        return $this->helper
            ->paginateArray($models, $this->getPaginationCount())
            ->appends($this->filterQueryStrings());
    }
}
