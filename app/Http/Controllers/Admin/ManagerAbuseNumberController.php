<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbuseNumberRequest;
use App\Http\Requests\UpdateAbuseNumberRequest;
use App\Models\AbuseNumber;
use Illuminate\Http\Request;

class ManagerAbuseNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abuses = AbuseNumber::latest()->paginate(10);

        return view('pages.abuses.manager.index',[
            'abuses'=>$abuses    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = AbuseNumber::getStatusFor();
        return view('pages.abuses.manager.add', [
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Abuse Numbers',
                    'route' => route('abuse.admin.index')
                ]
            ], 'Add New Abuse Number'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAbuseNumberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbuseNumberRequest $request)
    {
        $abuse = AbuseNumber::create($request->all());
        
        return $this->returnCrudData(__('system_messages.common.create_success'), route('abuse.admin.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbuseNumber  $abuse
     * @return \Illuminate\Http\Response
     */
    public function edit(AbuseNumber $abuse)
    {
        $config = AbuseNumber::getStatusFor();

        return view('pages.abuses.manager.edit', [
            'abuse' => $abuse,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Abuse Number',
                    'route' => route('abuse.admin.index')
                ]
            ], 'Edit Abuse Number'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbuseNumberRequest  $request
     * @param  \App\Models\AbuseNumber  $abuseNumber
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbuseNumberRequest $request, AbuseNumber $abuse)
    {
        $abuse->update($request->all());
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbuseNumber  $abuse
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbuseNumber $abuse,Request $request)
    {
        $abuse->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("abuse_numbers")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
