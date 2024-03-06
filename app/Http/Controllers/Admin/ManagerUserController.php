<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use App\Http\Controllers\Traits\User\Filtration;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presenters\UserPresenter;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

/**
 * @group ManagerUser
 */
class ManagerUserController extends Controller
{
    use Filtration;

    /**
     * index.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::query()->withRole('customer');
        $config = User::getStatusFor();

        if ($this->filterQueryStrings()) {
            $users = $this->filterData($request, $users);
        }

        return view('pages.user.manager.index', [
            'users' => app(UserPresenter::class)->paginate($users->get()),
//            'sorting' => User::getSortingOptions(),
            'roles' => Role::get(),
            'status' => $config['status'],
            'breadcrumb' => $this->breadcrumb([], 'Users')
        ]);
    }

    /**
     * edit.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $config = User::getStatusFor();
        return view('pages.user.manager.edit', [
            'breadcrumb' => $this->breadcrumb([
                [
                    'route' => route('user.admin.index'),
                    'title' => "Users"
                ]
            ], $user->full_name),
            'user' => $user,
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * delete.
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroy(User $user)
    {

        $this->authorize('delete', $user);
        DB::transaction(function () use ($user) {
            $user->update([
                'email' => time() . '-' . $user->email,
                'mobile' => time() . '-' . $user->mobile,
            ]);
            $user->delete();
        });

        return $this->returnCrudData(__('system_messages.common.delete_success'), route('user.admin.index'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $users = User::query()->whereIn('id',explode(",",$ids))->get();
        foreach ($users as $user){
            DB::transaction(function () use ($user) {
                $user->update([
                    'email' => time() . '-' . $user->email,
                    'mobile' => time() . '-' . $user->mobile,
                ]);
                $user->delete();
            });
        }
        return response()->json(['success'=>__('system_messages.common.delete_success'),
            'count'=>$users = sizeof(User::query()->withRole('customer')->get()),
            'items'=>'Users']);
    }
    public function export(Request $request)
    {
        return Excel::download(new UserExport($this->getUsers($request)), "Customers " . today()->format('d-m-Y') . ".csv");
    }

    private function getUsers(Request $request)
    {
        $users = User::query();
        if ($this->filterQueryStrings()) {
            $users = $this->filterData($request, $users);
        }
        return $users->get();
    }
}
