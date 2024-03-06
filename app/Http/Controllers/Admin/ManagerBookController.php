<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Author;
use App\Models\BookType;
use App\Models\Publisher;
use App\Models\Translator;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Presenters\BookPresenter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Controllers\Traits\Book\Filtration;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ManagerBookController extends Controller
{
    use Filtration;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::query();
        // foreach($books as $book){
        //     $slug = slugfy($book->item_name,'-');
        //     $book->update(['slug'=>$slug]);
        // }
        if ($this->filterQueryStrings()) {
            $books = $this->filterData($request, $books);  
        }
        $books = app(BookPresenter::class)->paginate($books->get());
        $config = Book::getStatusFor();

        return view('pages.books.manager.index',[
            'books'=>$books,
            'sorting' => Book::getSortingOptions(),
            'status' => $config['status'],
            'authors'=> Author::get()->sortBy('author_name'),
            'publishers'=> Publisher::all()->sortBy('publish_name'),
            'translators'=> Translator::all()->sortBy('translator_name'),
            'types'=> BookType::all()->sortBy('type_name'),
            'categories'=> BookCategory::get()->sortBy('cat_name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cloneId = $request->clone;
        $config = Book::getStatusFor();
        return view('pages.books.manager.add', [
            'book' => $cloneId ? Book::find($cloneId) : null,
            'categories' => BookCategory::all()->sortBy('cat_name'),
            'types' => BookType::all(),
            'authors'=> Author::all()->sortBy('author_name'),
            'publishers'=> Publisher::all()->sortBy('publish_name'),
            'translators'=> Translator::all()->sortBy('translator_name'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Books',
                    'route' => route('book.admin.index')
                ]
            ], 'Add New Book'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        
        $data = $request->except( 'cover');
        $data['slug'] = slugfy($request->item_name,'-');
        $book = Book::create($data);
        if ($cover = $request->cover) {
            $book->addHashedMedia($cover)->toMediaCollection('cover');
        }
        
        return $this->returnCrudData(__('system_messages.common.create_success'), route('book.admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $config = Book::getStatusFor();
        return view('pages.books.manager.edit', [
            'book' => $book,
            'categories' => BookCategory::all(),
            'types' => BookType::all(),
            'authors'=> Author::all()->sortBy('author_name'),
            'publishers'=> Publisher::all()->sortBy('publish_name'),
            'translators'=> Translator::all()->sortBy('translator_name'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Books',
                    'route' => route('book.admin.index')
                ]
            ], 'Edit Book'),
        ]);
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
        //dd($request->media_to_delete);
        $data = $request->except( 'cover','media_to_delete');
        //$data['slug'] = slugfy($request->item_name,'-');
        $book->update($data);
        if ($cover = $request->cover) {
            $book->addHashedMedia($cover)->toMediaCollection('cover');
        }
        if ($media_to_delete = $request->media_to_delete) {
            foreach ($media_to_delete as $media_id) {
                if ($media = Media::find($media_id)) {
                    $media->delete();
                }
            }
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, Request $request)
    {
        $book->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("books")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success'),'count'=> sizeof(Book::all()),'items'=> 'Books']);
    }
}
