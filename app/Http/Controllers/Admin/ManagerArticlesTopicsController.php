<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticlesTopics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Factory;
use Illuminate\View\View;
use App\Http\Controllers\Traits\Service\Filtration;
use App\Presenters\BookPresenter;

class ManagerArticlesTopicsController extends Controller
{
    use Filtration;
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $topics = ArticlesTopics::query()->latest()->where('type','article');
        if ($this->filterQueryStrings()) {
            $topics = $this->filterTitleData($request, $topics);  
        }
        $topics = app(BookPresenter::class)->paginate($topics->get());

        return view('pages.topics.index',[
            'topics'=>$topics
        ]);
    }

    public function courseTopics(Request $request)
    {
        $topics = ArticlesTopics::query()->latest()->where('type','course');
        if ($this->filterQueryStrings()) {
            $topics = $this->filterTitleData($request, $topics);  
        }
        $topics = app(BookPresenter::class)->paginate($topics->get());

        return view('pages.topics.index',[
            'topics'=>$topics
        ]);
    }

    /**
     * create.
     */
    public function create()
    {
        return view('pages.topics.add', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Topics',
                    'route' => route('topic.admin.index')
                ]
            ], 'Add New Topic'),
        ]);
    }

    /**
     * store.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $topic = ArticlesTopics::create($request->all());

        return $this->returnCrudData(__('system_messages.common.create_success'), route('topic.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $topic
     * @return Factory|View
     */
    public function edit(ArticlesTopics $topic)
    {
        return view('pages.topics.edit', [
            'topic' => $topic,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Topics',
                    'route' => route('topic.admin.index')
                ]
            ], 'Edit Topic'),
        ]);
    }

    /**
     * update.
     *
     * @param mixed $topic
     * @param Request $request
     */
    public function update(ArticlesTopics $topic, Request $request)
    {
        $topic->update($request->all());

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param ArticlesTopics $topic
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(ArticlesTopics $topic, Request $request)
    {
        $topic->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("articles_topics")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
