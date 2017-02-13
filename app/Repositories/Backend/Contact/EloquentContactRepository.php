<?php namespace App\Repositories\Backend\Contact;

/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 11:00 PM
 */

use App\Exceptions\GeneralException;


use App\Models\Contact\Contact;
use Illuminate\Support\Facades\DB;



class EloquentContactRepository implements  ContactRepositoryContract
{

    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
           if ($trashed == "true") {
            return Contact::onlyTrashed()
                ->select("*")
                ->get();
        }


        return Contact::select("*")
            ->where('status', $status)
            ->get();
    }



    public function update(Contact $contact, $input )
    {


        DB::transaction(function() use ($contact, $input ) {
            if ($contact->update($input)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now

                $contact->name = $input['name'] ;
                $contact->description =  $input['description'] ;

                $contact->save();


               // event(new UserUpdated($user));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }





    public function destroy(Contact $contact)
    {

        if ($contact->delete()) {
           // event(new UserDeleted($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }






   public function create($input)
   {


       $contact = $this->createContactStub($input);

       DB::transaction(function() use ($contact){
           if($contact->save()){


               //event(new CategoryCreated($category));

               return true;
           }
       });


   }


    private function createContactStub($input)
    {
        $contact                    = new Contact();


        $contact->name              = $input['name'];
        $contact->mobile            = $input["mobile"];
        $contact->email             = $input["email"];
        $contact->subject           = $input["subject"];


        return $contact;
    }


    /**
     * @param  Category $user
     * @param  $status
     * @return mixed
     */
    public function mark(Contact $contact, $status)
    {
       $contact->status = $status;


        if($contact->save()){
            return true;
        }

    }



    /**
     * @param  User $user
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete(Contact $contact)
    {
        //Failsafe
        if (is_null($contact->deleted_at)) {
            throw new GeneralException("This user must be deleted first before it can be destroyed permanently.");
        }

        DB::transaction(function() use ($contact) {

            if ($contact->forceDelete()) {
                ///event(new UserPermanentlyDeleted($user));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
        });
    }


    public function restore(Contact $contact)
    {
        //Failsafe
        if (is_null($contact->deleted_at)) {
            throw new GeneralException("This user is not deleted so it can not be restored.");
        }

        if ($contact->restore()) {
            //event(new UserRestored($category));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }


}