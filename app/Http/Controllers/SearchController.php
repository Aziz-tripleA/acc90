<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Article;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookType;
use App\Models\Course;
use App\Models\Publisher;
use App\Models\Translator;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function getSearchResultPage(Request $request)
    {
        return view('search.index',[
            'locale' => request()->session()->get('locale'),
            'title' => 'الكتب',
            'image' => asset('assets/images/search.jpeg'),
            'breadcrumb' => $this->breadcrumb([], 'البحث' , false)
        ]);
    }

    public function getSearchResult(Request $request)
    {
        $query = $request->get('query');
        $searchResults = (new Search())
            ->registerModel(Article::class, ['title','fulltext'])
            ->registerModel(Ads::class, ['title','description'])
            ->registerModel(Book::class, ['item_name','book_details'])
            ->registerModel(Course::class, ['title','content'])
            ->search($query);

        $perPage = 10; // Set the number of results per page
        $currentPage = $request->get('page', 1); // Get the current page from the request
        $paginatedResults = $searchResults->forPage($currentPage, $perPage);
        $totalResults = $searchResults->count();
        $totalPages = ceil($totalResults / $perPage);
        $view = view('search.results', ['searchResults' => $paginatedResults])->render();
        return response()->json([
            'html' => $view,
            'pagination' => [
                'current_page' => $currentPage,
                'total_pages' => $totalPages,
                'has_more_pages' => $currentPage < $totalPages,
            ],
            ]);

    }

}
