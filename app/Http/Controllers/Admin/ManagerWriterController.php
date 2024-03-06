<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerWriterController extends Controller
{
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $writers = Writer::query()->orderBy('name')->paginate(10);

        return view('pages.writers.index',[
            'writers'=>$writers
        ]);
    }

    /**
     * create.
     */
    public function create()
    {
        return view('pages.writers.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Writers',
                    'route' => route('writer.admin.index')
                ]
            ], 'Add New Writer'),
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
        $writer = Writer::create(['name'=>$request->name]);

        return $this->returnCrudData(__('system_messages.common.create_success'), route('writer.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $writer
     * @return Factory|View
     */
    public function edit(Writer $writer)
    {
        return view('pages.writers.edit', [
            'writer' => $writer,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Writers',
                    'route' => route('writer.admin.index')
                ]
            ], 'Edit Writer'),
        ]);
    }

    /**
     * update.
     *
     * @param mixed $writer
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function update(Writer $writer, Request $request)
    {
        $writer->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param Writer $writer
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Writer $writer, Request $request)
    {
        $writer->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("writers")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
