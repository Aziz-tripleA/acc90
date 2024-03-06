<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Writer;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\FeaturedImage;
use App\Models\ArticlesTopics;
use App\Presenters\ArticlePresenter;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Controllers\Traits\Article\Filtration;

class ArticleController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::query()->IsActive()->latest();
        $featured = FeaturedImage::where('title','articles')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }
        if ($this->filterQueryStrings()) {
            $articles = $this->filterData($request, $articles);  
        }
        $articles = app(ArticlePresenter::class)->paginate($articles->get());
        return view('pages.articles.index',[
            'locale' => request()->session()->get('locale'),
            'title' => 'المقالات',
            'articles'=> $articles,
            'writers'=> Writer::all()->sortBy('name'),
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
            'topics'=> ArticlesTopics::where('type','article')->get(),
            'breadcrumb' => $this->breadcrumb([], 'المقالات' ,false)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstorfail();
        $other_articles = Article::query()->where('topic_id',$article->topic_id)->where('id','!=',$article->id)->take(2)->get();
        // if(is_array($other_articles) && count($other_articles)>1){
        //     $other_articles = $other_articles->random(2);
        // }

      
        return view('pages.articles.show',
            [
                'locale' => request()->session()->get('locale'),
                'article'=>$article,
                'title' => 'المقالات',
                'writer' => $article->writer,
                'image'=>$article->getUrlFor('cover'),
                'other_articles'=>$other_articles,
                'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'المقالات',
                    'route' => route('article.index')
                ]
                ]
                , $article->title ,false) 
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
