<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\BookPresenter;

class ManagerAuthorController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::query()->orderBy('author_name');
        if ($this->filterQueryStrings()) {
            $authors = $this->filterAuthorData($request, $authors);  
        }
        $authors = app(BookPresenter::class)->paginate($authors->get());

        return view('pages.books.authors.index',[
            'authors'=>$authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.books.authors.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Authors',
                    'route' => route('author.admin.index')
                ]
            ], 'Add New Author'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->all());

        return $this->returnCrudData(__('system_messages.common.create_success'), route('author.admin.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('pages.books.authors.edit', [
            'author' => $author,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Authors',
                    'route' => route('author.admin.index')
                ]
            ], 'Edit Author'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateauthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author, Request $request)
    {
        $author->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }
}
