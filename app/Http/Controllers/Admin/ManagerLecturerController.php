<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Factory;
use Illuminate\View\View;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\BookPresenter;

class ManagerLecturerController extends Controller
{
    use Filtration;
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $lecturers = Lecturer::query()->orderBy('name');
        if ($this->filterQueryStrings()) {
            $lecturers = $this->filterData($request, $lecturers);  
        }
        $lecturers = app(BookPresenter::class)->paginate($lecturers->get());

        return view('pages.courses.manager.lecturers.index',[
            'lecturers'=>$lecturers
        ]);
    }

    /**
     * create.
     */
    public function create()
    {
        return view('pages.courses.manager.lecturers.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Lecturers',
                    'route' => route('lecturer.admin.index')
                ]
            ], 'Add New Lecturer'),
        ]);
    }

    /**
     * store.
     *
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $lecturer = Lecturer::create(['name'=>$request->name]);

        return $this->returnCrudData(__('system_messages.common.create_success'), route('lecturer.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $lecturer
     * @return Factory|View
     */
    public function edit(Lecturer $lecturer)
    {
        return view('pages.courses.manager.lecturers.edit', [
            'lecturer' => $lecturer,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Lecturers',
                    'route' => route('lecturer.admin.index')
                ]
            ], 'Edit Lecturer'),
        ]);
    }

    /**
     * update.
     *
     * @param mixed $lecturer
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function update(Lecturer $lecturer, Request $request)
    {
        $lecturer->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param Lecturer $lecturer
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Lecturer $lecturer, Request $request)
    {
        $lecturer->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("lecturers")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
