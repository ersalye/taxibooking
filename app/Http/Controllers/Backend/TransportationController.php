<?php
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:29 PM
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Transportation\ManagerTransportationRequest;
use App\Http\Requests\Backend\Transportation\StoreTransportationRequest;
use App\Http\Requests\Backend\Transportation\UpdateTransportationRequest;

use App\Models\Transportation\Transportation;
use App\Repositories\Backend\Transportation\TransportationRepositoryContract;
use Yajra\Datatables\Request;
use Yajra\Datatables\Facades\Datatables;



class TransportationController extends Controller
{


    protected $transportation;

    public function __construct(TransportationRepositoryContract $repositoryContract)
    {
            $this->transportation = $repositoryContract;
    }

    public function index() {

           return view('backend.transportations.index');
    }




    public function get(ManagerTransportationRequest $request) {
        return Datatables::of($this->transportation->getForDataTable($request->get("status"),$request->get("trashed")))

            ->addColumn('actions', function($user) {
                return $user->action_buttons;
            })
            ->make(true);
    }


    public function create(ManagerTransportationRequest $request) {
       return view("backend.transportations.create");
    }

    public function store(StoreTransportationRequest $request) {

        $this->transportation->create($request->all());

        return redirect()->route('admin.transportation.index')->withFlashSuccess(trans('alerts.backend.transportations.created'));

    }



    public function edit(Transportation $transportation, ManagerTransportationRequest $request) {


        return view('backend.transportations.edit')
            ->withTransportation($transportation);
    }


    public function update(Transportation $transportation,UpdateTransportationRequest $request) {
            $this->transportation->update($transportation,$request->all());
            return redirect()->route("admin.transportation.index")->withFlashSuccess(trans('alerts.backend.transportations.updated'));
    }



    public function destroy(Transportation $transportation, ManagerTransportationRequest $request) {
        $this->transportation->destroy($transportation);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transportations.deleted'));
    }



    public function deactivated(ManagerTransportationRequest $request) {
        return view('backend.transportations.deactivated');
    }


    /**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deleted(ManagerTransportationRequest $request)
    {
        return view('backend.transportations.deleted');
    }


    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function delete(Transportation $deletedTransportation, ManagerTransportationRequest $request)
    {

       $this->transportation->delete($deletedTransportation);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transportations.deleted_permanently'));
    }




    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function restore(Transportation $deletedTransportation, ManagerTransportationRequest $request)
    {


        $this->transportation->restore($deletedTransportation);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transportations.restored'));
    }







    /**
     * @param User $user
     * @param $status
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function mark(Transportation $transportation, $status, ManagerTransportationRequest $request)
    {


        $this->transportation->mark($transportation, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transportations.updated'));
    }



}