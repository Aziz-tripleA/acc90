<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\BookPresenter;


class ManagerServiceController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::query()->latest();
        if ($this->filterQueryStrings()) {
            $services = $this->filterData($request, $services);  
        }
        $services = app(BookPresenter::class)->paginate($services->get());

        return view('pages.services.manager.index',[
            'services'=>$services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.manager.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Services',
                    'route' => route('service.admin.index')
                ]
            ], 'Add New Service'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->except( ['cover','is_featured']);
        $data['is_featured'] = $request->is_featured?:false;
        $service = Service::create($data);
        if ($cover = $request->cover) {
            $service->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('service.admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('pages.services.manager.edit', [
            'service' => $service,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Services',
                    'route' => route('service.admin.index')
                ]
            ], 'Edit Service'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->except( ['cover','is_featured']);
        $data['is_featured'] = $request->is_featured?:false;
        $service->update($data);
        
        if ($cover = $request->cover) {
            $service->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, Request $request)
    {
        $service->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }
}
