<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\BookType;
use App\Models\Publisher;
use App\Models\Translator;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Models\FeaturedImage;
use Database\Seeders\Category;
use App\Presenters\BookPresenter;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Controllers\Traits\Book\Filtration;

class BookController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::query()->IsActive()->latest();
        $featured = FeaturedImage::where('title','books')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }
        if ($this->filterQueryStrings()) {
            $books = $this->filterData($request, $books);  
        }
        $books = app(BookPresenter::class)->paginate($books->get());
        return view('pages.books.index',[
            'books'=> $books,
            'locale' => request()->session()->get('locale'),
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
            'title' => 'الكتب',
            'authors'=> Author::all()->sortBy('author_name'),
            'publishers'=> Publisher::all()->sortBy('publish_name'),
            'translators'=> Translator::all()->sortBy('translator_name'),
            'categories'=> BookCategory::all()->sortBy('cat_name'),
            'types' => BookType::all(),
            'breadcrumb' => $this->breadcrumb(
                []
                , 'الكتب' , false)
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
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstorfail();
        $related_books = Book::query()->latest()->where('cat_id',$book->cat_id)->where('id','!=',$book->id)->take(4)->get();
        $small_books = [];
        if($book->type_id == 3){
            $small_books = Book::query()->IsActive()->latest()->where('type_id','3')->take(4)->get();
        }

        return view('pages.books.show',
            [
                'book'=>$book,
                'title' => 'الكتب',
                'image'=>$book->getUrlFor('cover'),
                'locale' => request()->session()->get('locale'),
                'related_books'=> $related_books,
                'small_books' => isset($small_books)?$small_books:[],
                'breadcrumb' => $this->breadcrumb([
                [
                    'title' => $book->type->type_name,
                    'route' => route('book.index',['type'=>$book->type->type_name])
                ]
                ]
                , $book->item_name ,false)
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
