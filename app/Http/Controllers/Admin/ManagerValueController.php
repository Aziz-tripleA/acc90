<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Value;
use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\BookPresenter;

class ManagerValueController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $values = Value::query()->latest();
        if ($this->filterQueryStrings()) {
            $values = $this->filterData($request, $values);  
        }
        $values = app(BookPresenter::class)->paginate($values->get());

        return view('pages.values.manager.index',[
            'values'=>$values
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.values.manager.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Values',
                    'route' => route('value.admin.index')
                ]
            ], 'Add New Value'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreValueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValueRequest $request)
    {
        $value = Value::create($request->all());
        
        return $this->returnCrudData(__('system_messages.common.create_success'), route('value.admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function show(Value $value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function edit(Value $value)
    {
        return view('pages.values.manager.edit', [
            'value' => $value,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Values',
                    'route' => route('value.admin.index')
                ]
            ], 'Edit Value'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateValueRequest  $request
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValueRequest $request, Value $value)
    {
        $value->update($request->all());
        
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function destroy(Value $value, Request $request)
    {
        $value->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }
}
