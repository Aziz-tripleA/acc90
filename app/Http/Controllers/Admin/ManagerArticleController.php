<?php

namespace App\Http\Controllers\Admin;

use App\Models\Writer;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\ArticlesTopics;
use App\Presenters\ArticlePresenter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Traits\Article\Filtration;

class ManagerArticleController extends Controller
{
    use Filtration;
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $articles = Article::with(['writer','topic'])->latest();
        if ($this->filterQueryStrings()) {
            $articles = $this->filterData($request, $articles);  
        }
        $articles = app(ArticlePresenter::class)->paginate($articles->get());
        $config = Article::getStatusFor();
        return view('pages.articles.manager.index',[
            'articles'=>$articles,
            'writers' => Writer::all()->sortBy('name'),
            'types'=> ArticlesTopics::where('type','article')->get(),
        ]);
    }

    public function topics(Request $request)
    {        
        return view('pages.articles.manager.index',[
            'topics'=> ArticlesTopics::where('type','article')->get(),
        ]);
    }

    
    /**
     * create.
     */
    public function create(Request $request)
    {
        $cloneId = $request->clone;
        $config = Article::getStatusFor();
        return view('pages.articles.manager.add', [
            'article' => $cloneId ? Article::find($cloneId) : null,
            'topics' => ArticlesTopics::where('type','article')->get(),
            'writers' => Writer::all()->sortBy('name'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'articles',
                    'route' => route('article.admin.index')
                ]
            ], 'Add New article'),
        ]);
    }

    /**
     * store.
     *
     * @param ArticleRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->except( 'cover');
        $data['slug'] = slugfy($request->title,'-');
        $article = Article::create($data);
        if ($cover = $request->cover) {
            $article->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('article.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $article
     * @return Factory|View
     */
    public function edit(Article $article)
    {
        $config = Article::getStatusFor();

        return view('pages.articles.manager.edit', [
            'article' => $article,
            'topics' => ArticlesTopics::where('type','article')->get(),
            'writers' => Writer::all()->sortBy('name'),
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Articles',
                    'route' => route('article.admin.index')
                ]
            ], 'Edit Article'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * update.
     *
     * @param mixed article
     * @param ArticleRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $data = $request->except( 'cover');
        //$data['slug'] = slugfy($request->title,'-');
        $article->update($data);
        if ($cover = $request->cover) {
            $article->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param Article $article
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Article $article, Request $request)
    {
        $article->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("articles")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
