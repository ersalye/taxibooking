<?php
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:29 PM
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Contact\ManagerContactRequest;
use App\Http\Requests\Backend\Contact\StoreContactRequest;
use App\Http\Requests\Backend\Contact\UpdateContactRequest;

use App\Models\Contact\Contact;
use App\Models\Transportation\Transportation;
use App\Repositories\Backend\Contact\ContactRepositoryContract;
use App\Repositories\Backend\Transportation\TransportationRepositoryContract;
use Yajra\Datatables\Request;
use Yajra\Datatables\Facades\Datatables;



class ContactController extends Controller
{


    protected $contact;

    public function __construct(ContactRepositoryContract $contact)
    {
            $this->contact = $contact;
    }

    public function index() {

           return view('backend.contacts.index');
    }




    public function get(ManagerContactRequest $request) {
        return Datatables::of($this->contact->getForDataTable($request->get("status"),$request->get("trashed")))

            ->addColumn('actions', function($contact) {
                return $contact->action_buttons;
            })
            ->make(true);
    }


    public function create(ManagerContactRequest $request) {
       return view("backend.contacts.create");
    }

    public function store(StoreContactRequest $request) {


        $this->contact->create($request->all());

        if($request->has("isFront")) {
            $request->session()->flash('success', 'You has been submit your contact');
            return back();
        }

        return redirect()->route('admin.contact.index')->withFlashSuccess(trans('alerts.backend.contacts.created'));

    }



    public function edit(Contact $contact, ManagerContactRequest $request) {


        return view('backend.contacts.edit')
            ->withContact($contact);
    }


    public function update( Contact $contact, UpdateContactRequest $request) {
            $this->contact->update($contact,$request->all());
            return redirect()->route("admin.contact.index")->withFlashSuccess(trans('alerts.backend.contacts.updated'));
    }



    public function destroy(Contact $contact, ManagerContactRequest $request) {
        $this->contact->destroy($contact);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.contacts.deleted'));
    }



    public function deactivated(ManagerContactRequest $request) {
        return view('backend.contacts.deactivated');
    }


    public function deleted(ManagerContactRequest $request)
    {
        return view('backend.contacts.deleted');
    }



    public function delete(Contact $contact, ManagerContactRequest $request)
    {

       $this->contact->delete($contact);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.contacts.deleted_permanently'));
    }



    public function restore(Contact $deletedContact, ManagerTransportationRequest $request)
    {
        $this->contact->restore($deletedContact);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.contacts.restored'));
    }


    public function mark( Contact $contact, $status, ManagerContactRequest $request)
    {


        $this->contact->mark($contact, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.contacts.updated'));
    }



}