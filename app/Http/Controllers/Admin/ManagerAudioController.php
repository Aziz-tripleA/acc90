<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAudioRequest;
use App\Http\Requests\UpdateAudioRequest;
use App\Models\Audio;
use App\Http\Controllers\Traits\Course\Filtration;
use App\Presenters\BookPresenter;
use Illuminate\Http\Request;

class ManagerAudioController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $audios = Audio::query()->latest();
        if ($this->filterQueryStrings()) {
            $audios = $this->filterData($request, $audios);  
        }
        $audios = app(BookPresenter::class)->paginate($audios->get());
        return view('pages.audios.manager.index',[
            'audios'=>$audios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.audios.manager.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Audios',
                    'route' => route('audio.admin.index')
                ]
            ], 'Add New Audio File'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAudioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAudioRequest $request)
    {
        $data = $request->except( 'audio_file');
        $audio = Audio::create($data);
        if ($audio_file = $request->audio_file) {
            $audio->addHashedMedia($audio_file)->toMediaCollection('audio_file');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('audio.admin.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        return view('pages.audios.manager.edit', [
            'audio' => $audio,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Audios',
                    'route' => route('audio.admin.index')
                ]
            ], 'Edit Audio'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAudioRequest  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAudioRequest $request, Audio $audio)
    {
        $data = $request->except( 'audio_file');
        //$data['slug'] = slugfy($request->title,'-');
        $audio->update($data);
        if ($audio_file = $request->audio_file) {
            $audio->addHashedMedia($audio_file)->toMediaCollection('audio_file');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio,Request $request)
    {
        $audio->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("audios")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
