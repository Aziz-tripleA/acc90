<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookTypeRequest;
use App\Http\Requests\UpdateBookTypeRequest;
use App\Models\BookType;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\Book\Filtration;
use App\Presenters\BookPresenter;

class ManagerBookTypeController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = BookType::query()->latest();
        if ($this->filterQueryStrings()) {
            $types = $this->filterTypeData($request, $types);  
        }
        $types = app(BookPresenter::class)->paginate($types->get());

        return view('pages.books.types.index',[
            'types'=>$types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.books.types.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Types',
                    'route' => route('bookType.admin.index')
                ]
            ], 'Add New Type'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookTypeRequest $request)
    {
        $bookType = BookType::create($request->all());

        return $this->returnCrudData(__('system_messages.common.create_success'), route('bookType.admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function show(BookType $bookType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function edit(BookType $bookType)
    {
        return view('pages.books.types.edit', [
            'bookType' => $bookType,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'types',
                    'route' => route('bookType.admin.index')
                ]
            ], 'Edit Type'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookTypeRequest  $request
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookTypeRequest $request, BookType $bookType)
    {
        $bookType->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookType $bookType, Request $request)
    {
        $bookType->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }
}
