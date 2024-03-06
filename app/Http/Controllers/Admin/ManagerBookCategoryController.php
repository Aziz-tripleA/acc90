<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBookCategoryRequest;
use App\Http\Requests\UpdateBookCategoryRequest;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Book\Filtration;
use App\Presenters\BookPresenter;

class ManagerBookCategoryController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = BookCategory::query()->latest();
        if ($this->filterQueryStrings()) {
            $categories = $this->filterCategoryData($request, $categories);  
        }
        $categories = app(BookPresenter::class)->paginate($categories->get()->sortBy('cat_name'));

        return view('pages.books.categories.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.books.categories.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Categories',
                    'route' => route('bookCategory.admin.index')
                ]
            ], 'Add New Category'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookCategoryRequest $request)
    {
        $bookCategory = BookCategory::create($request->all());

        return $this->returnCrudData(__('system_messages.common.create_success'), route('bookCategory.admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BookCategory $bookCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BookCategory $bookCategory)
    {
        return view('pages.books.categories.edit', [
            'bookCategory' => $bookCategory,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'categories',
                    'route' => route('bookCategory.admin.index')
                ]
            ], 'Edit Category'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookCategoryRequest  $request
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookCategoryRequest $request, BookCategory $bookCategory)
    {
        $bookCategory->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookCategory $bookCategory, Request $request)
    {
        $bookCategory->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }
}
