<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerAdsController extends Controller
{
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $ads = Ads::latest()->paginate(10);

        return view('pages.ads.manager.index',[
            'ads'=>$ads    
        ]);
    }

    /**
     * create.
     */
    public function create()
    {
        $config = Ads::getStatusFor();
        return view('pages.ads.manager.add', [
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Announcements',
                    'route' => route('ads.admin.index')
                ]
            ], 'Add New Announcement'),
        ]);
    }

    /**
     * store.
     *
     * @param AnnouncementRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function store(AnnouncementRequest $request)
    {
        $data = $request->except( ['cover','is_featured']);
        $data['is_featured'] = $request->is_featured?:false;
        $announcement = Ads::create($data);
        if ($cover = $request->cover) {
            $announcement->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('ads.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $announcement
     * @return Factory|View
     */
    public function edit(Ads $ads)
    {
        $config = Ads::getStatusFor();

        return view('pages.ads.manager.edit', [
            'announcement' => $ads,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Announcements',
                    'route' => route('ads.admin.index')
                ]
            ], 'Edit Announcement'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * update.
     *
     * @param mixed Ads
     * @param AnnouncementRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function update(Ads $ads, AnnouncementRequest $request)
    {
        $data = $request->except( ['cover','is_featured']);
        $data['is_featured'] = $request->is_featured?:false;
        $ads->update($data);
        if ($cover = $request->cover) {
            $ads->addHashedMedia($cover)->toMediaCollection('cover');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param Ads $announcement
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Ads $ads, Request $request)
    {
        $ads->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("ads")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
