<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Article;
use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController
{

    public function getSearchResult(Request $request)
    {
        $query = $request->get('query');
        $searchResults = (new Search())
            ->registerModel(Article::class, 'title')
            ->registerModel(Ads::class, 'title')
            ->registerModel(Book::class, 'item_name')
            ->registerModel(Course::class, 'title')
            ->search($query);

        return $searchResults;
    }

}
