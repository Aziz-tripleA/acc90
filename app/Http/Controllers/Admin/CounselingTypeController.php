<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Course\Filtration;
use App\Models\CounselingType;
use App\Presenters\BookPresenter;

class CounselingTypeController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $counselingTypes = CounselingType::query()->latest();
        if ($this->filterQueryStrings()) {
            $counselingTypes = $this->filterData($request, $counselingTypes);  
        }
        $counselingTypes = app(BookPresenter::class)->paginate($counselingTypes->get());
        return view('pages.counselingTypes.manager.index',[
            'counselingTypes'=>$counselingTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.counselingTypes.manager.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Counseling Type',
                    'route' => route('counselingType.admin.index')
                ]
            ], 'Add New Counseling Type Form'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except( 'form');
        $counselingType = CounselingType::create($data);
        if ($form = $request->form) {
            $counselingType->addHashedMedia($form)->toMediaCollection('form');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('counselingType.admin.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(CounselingType $counselingType)
    {
        return view('pages.counselingTypes.manager.edit', [
            'counselingType' => $counselingType,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Counseling Types',
                    'route' => route('counselingType.admin.index')
                ]
            ], 'Edit Counseling Type'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAudioRequest  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CounselingType $counselingType)
    {
        $data = $request->except( 'form');
        //$data['slug'] = slugfy($request->title,'-');
        $counselingType->update($data);
        if ($form = $request->form) {
            $counselingType->addHashedMedia($form)->toMediaCollection('form');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(CounselingType $counselingType,Request $request)
    {
        $counselingType->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("audios")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
