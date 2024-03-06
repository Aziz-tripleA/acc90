<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTranslatorRequest;
use App\Http\Requests\UpdateTranslatorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translator;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\BookPresenter;

class ManagerTranslatorController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $translators = Translator::query()->orderBy('translator_name');
        if ($this->filterQueryStrings()) {
            $translators = $this->filterTranslatorData($request, $translators);  
        }
        $translators = app(BookPresenter::class)->paginate($translators->get());

        return view('pages.books.translators.index',[
            'translators'=>$translators
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.books.translators.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'translator',
                    'route' => route('translator.admin.index')
                ]
            ], 'Add New Translator'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTranslatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTranslatorRequest $request)
    {
        $translator = Translator::create($request->all());
        return $this->returnCrudData(__('system_messages.common.create_success'), route('translator.admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Translator  $translator
     * @return \Illuminate\Http\Response
     */
    public function show(Translator $translator)
    {
        return view('pages.books.translators.edit', [
            'translator' => $translator,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Translators',
                    'route' => route('translator.admin.index')
                ]
            ], 'Edit Translator'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Translator  $translator
     * @return \Illuminate\Http\Response
     */
    public function edit(Translator $translator, Request $request)
    {
        return view('pages.books.translators.edit', [
            'translator' => $translator,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Translators',
                    'route' => route('translator.admin.index')
                ]
            ], 'Edit Translator'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTranslatorRequest  $request
     * @param  \App\Models\Translator  $translator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTranslatorRequest $request, Translator $translator)
    {
        $translator->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Translator  $translator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translator $translator, Request $request)
    {
        if(sizeOf($translator->books)>0){
            return $this->returnCrudData(('This translator can`t be deleted because it has books related'), $request->redirect_to ?:url()->previous(),'error');
        }
        $translator->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }
}
