<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerposRequest;
use App\Models\Perpos;
use Illuminate\Http\Request;

class ManagerPerposController extends Controller
{
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $perposes = Perpos::latest()->paginate(10);

        return view('pages.perposes.manager.index',[
            'perposes'=>$perposes    
        ]);
    }

    /**
     * create.
     */
    public function create()
    {
        $config = Perpos::getStatusFor();
        return view('pages.perposes.manager.add', [
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Perposes',
                    'route' => route('perpos.admin.index')
                ]
            ], 'Add New Perpose'),
        ]);
    }

    /**
     * store.
     *
     * @param PerposRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function store(PerposRequest $request)
    {
        $perpos = Perpos::create($request->except( 'cover'));
        if ($cover = $request->cover) {
            $perpos->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('perpos.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $perpos
     * @return Factory|View
     */
    public function edit(Perpos $perpos)
    {
        $config = Perpos::getStatusFor();

        return view('pages.perposes.manager.edit', [
            'perpos' => $perpos,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Perpose',
                    'route' => route('perpos.admin.index')
                ]
            ], 'Edit perpos'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * update.
     *
     * @param mixed Perpos
     * @param perposRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function update(Perpos $perpos, PerposRequest $request)
    {
        $perpos->update($request->except('cover'));
        if ($cover = $request->cover) {
            $perpos->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param Perpos $perpos
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Perpos $perpos, Request $request)
    {
        $perpos->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("perpos")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
