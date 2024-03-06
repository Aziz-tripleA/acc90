<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\CommonPresenter;

class ManagerEmployeeController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::query()->orderBy('name');
        if ($this->filterQueryStrings()) {
            $employees = $this->filterData($request, $employees);  
        }
        $employees = app(CommonPresenter::class)->paginate($employees->get());

        return view('pages.employees.manager.index',[
            'employees'=>$employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Employee::getStatusFor();
        return view('pages.employees.manager.add', [
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Employees',
                    'route' => route('employee.admin.index')
                ]
            ], 'Add New Employee'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->except( 'cover'));
        if ($cover = $request->cover) {
            $employee->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('employee.admin.index'));
    
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $config = Employee::getStatusFor();

        return view('pages.employees.manager.edit', [
            'employee' => $employee,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Employee',
                    'route' => route('employee.admin.index')
                ]
            ], 'Edit Employee'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->except( 'cover'));
        if ($cover = $request->cover) {
            $employee->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, Request $request)
    {
        $employee->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("employees")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}