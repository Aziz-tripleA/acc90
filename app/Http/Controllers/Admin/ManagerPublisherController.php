<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\BookPresenter;

class ManagerPublisherController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $publishers = Publisher::query()->orderBy('publish_name');
        if ($this->filterQueryStrings()) {
            $publishers = $this->filterPublisherData($request, $publishers);  
        }
        $publishers = app(BookPresenter::class)->paginate($publishers->get());

        return view('pages.books.publishers.index',[
            'publishers'=>$publishers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.books.publishers.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'publishers',
                    'route' => route('publisher.admin.index')
                ]
            ], 'Add New publisher'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublisherRequest $request)
    {
        $publisher = Publisher::create($request->all());

        return $this->returnCrudData(__('system_messages.common.create_success'), route('publisher.admin.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('pages.books.publishers.edit', [
            'publisher' => $publisher,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Publishers',
                    'route' => route('publisher.admin.index')
                ]
            ], 'Edit Publisher'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublisherRequest  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher,Request $request)
    {
        $publisher->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }
}
