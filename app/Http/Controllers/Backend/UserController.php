<?php
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:29 PM
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\AUser\ManagerUserRequest;
use App\Http\Requests\Backend\AUser\StoreUserRequest;
use App\Http\Requests\Backend\AUser\UpdateUserRequest;


use App\Repositories\Backend\Access\Role\RoleRepositoryContract;
use App\Repositories\Backend\AUser\UserRepositoryContract;

use Laravel\Socialite\One\User;
use Yajra\Datatables\Facades\Datatables;



class UserController extends Controller
{

    protected $user ;
    protected $role;



    public function __construct(UserRepositoryContract $user , RoleRepositoryContract $role)
    {

        $this->user = $user;
        $this->role = $role;


    }

    public function index() {

        $roles = $this->role->getAllRoles();

        return view('backend.users.index', compact('roles',$roles));
    }




    public function get(ManagerUserRequest $request) {

        $filter=null;
        if($request->has("filter")){
            $filter = $request->get("filter");
        }


        return Datatables::of($this->user->getForDataTable($request->get("status"),$request->get("trashed"),$filter))
            ->editColumn('confirmed', function($user) {
                return $user->confirmed_label;
            })

            ->editColumn('approved', function($user) {
                return $user->approved_label;
            })


            ->addColumn('roles', function($user) {
                $roles = [];

                if ($user->roles()->count() > 0) {
                    foreach ($user->roles as $role) {
                        array_push($roles, $role->name);
                    }

                    return implode("<br/>", $roles);
                } else {
                    return trans('labels.general.none');
                }
            })
            ->addColumn('actions', function($user) {
                return $user->action_buttons;
            })
            ->make(true);



    }


    public function create(ManagerUserRequest $request) {
        return view("backend.user.create");
    }

    public function store(ManagerUserRequest $request) {

        $this->menu->create($request->all());

        return redirect()->route('admin.user.index')->withFlashSuccess(trans('alerts.backend.users.created'));

    }



    public function edit(User $user, ManagerUserRequest $request) {


        return view('backend.user.edit')
            ->withRide($user);
    }


    public function update( User $user ,ManagerUserRequest $request) {
        $this->user->update($user,$request->all());
        return redirect()->route("admin.user.index")->withFlashSuccess(trans('alerts.backend.users.updated'));
    }



    public function destroy(User $user, ManagerUserRequest $request) {
        $this->menu->destroy($user);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.deleted'));
    }



    public function deactivated(ManagerUserRequest $request) {
        return view('backend.users.deactivated');
    }


    /**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deleted(ManagerUserRequest $request)
    {
        return view('backend.users.deleted');
    }


    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function delete(User $deletedUser, ManagerRideRequest $request)
    {

        $this->user->delete($deletedUser);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.deleted_permanently'));
    }




    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function restore(User $deletedUser, ManagerRideRequest $request)
    {


        $this->user->restore($deletedUser);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.restored'));
    }







    /**
     * @param User $user
     * @param $status
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function mark(User $user, $status, ManagerUserRequest $request)
    {


        $this->user->mark($user, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.updated'));
    }


}