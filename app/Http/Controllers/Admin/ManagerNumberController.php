<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Models\Number;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numbers = Number::latest()->paginate(10);

        return view('pages.numbers.manager.index',[
            'numbers'=>$numbers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Number::getStatusFor();
        return view('pages.numbers.manager.add', [
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Numbers',
                    'route' => route('number.admin.index')
                ]
            ], 'Add New Number'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNumberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumberRequest $request)
    {
        $number = Number::create($request->all());
        return $this->returnCrudData(__('system_messages.common.create_success'), route('number.admin.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Number $number)
    {
        $config = Number::getStatusFor();

        return view('pages.numbers.manager.edit', [
            'number' => $number,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Number',
                    'route' => route('number.admin.index')
                ]
            ], 'Edit Number'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNumberRequest  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumberRequest $request, Number $number)
    {
        $number->update($request->all());
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Number $number)
    {
        $number->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("numbers")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
