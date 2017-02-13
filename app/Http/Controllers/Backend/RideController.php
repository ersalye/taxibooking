<?php
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:29 PM
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\Ride\ManagerRideRequest;
use App\Http\Requests\Backend\Ride\StoreRideRequest;
use App\Http\Requests\Backend\Ride\UpdateRideRequest;

use App\Models\Ride\Ride;
use App\Repositories\Backend\Ride\RideRepositoryContract;

use Yajra\Datatables\Facades\Datatables;



class RideController extends Controller
{

    protected $ride ;


    public function __construct( RideRepositoryContract $ride )
    {

        $this->ride = $ride;


    }

    public function index() {

        return view('backend.rides.index');
    }




    public function get(ManagerRideRequest $request) {
        return Datatables::of($this->ride->getForDataTable($request->get("status"),$request->get("trashed")))

            ->addColumn('actions', function($user) {
                return $user->action_buttons;
            })
            ->make(true);
    }


    public function create(ManagerRideRequest $request) {
        return view("backend.rides.create");
    }

    public function store(StoreRideRequest $request) {

        $this->menu->create($request->all());

        return redirect()->route('admin.rides.index')->withFlashSuccess(trans('alerts.backend.rides.created'));

    }



    public function edit(Ride $ride, ManagerRideRequest $request) {


        return view('backend.rides.edit')
            ->withRide($ride);
    }


    public function update( Ride $ride ,UpdateRideRequest $request) {
        $this->menu->update($ride,$request->all());
        return redirect()->route("admin.rides.index")->withFlashSuccess(trans('alerts.backend.rides.updated'));
    }



    public function destroy(Menu $menu, ManagerRideRequest $request) {
        $this->menu->destroy($menu);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.menus.deleted'));
    }



    public function deactivated(ManagerRideRequest $request) {
        return view('backend.menus.deactivated');
    }


    /**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deleted(ManagerRideRequest $request)
    {
        return view('backend.menus.deleted');
    }


    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function delete(Menu $deletedMenu, ManagerRideRequest $request)
    {

        $this->menu->delete($deletedMenu);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.menus.deleted_permanently'));
    }




    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function restore(Menu $deletedMenu, ManagerRideRequest $request)
    {


        $this->menu->restore($deletedMenu);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.menus.restored'));
    }







    /**
     * @param User $user
     * @param $status
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function mark(Menu $menu, $status, ManagerRideRequest $request)
    {


        $this->menu->mark($menu, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.menus.updated'));
    }


}