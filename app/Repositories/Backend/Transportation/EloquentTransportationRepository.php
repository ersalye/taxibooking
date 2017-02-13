<?php namespace App\Repositories\Backend\Transportation;

/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 11:00 PM
 */

use App\Exceptions\GeneralException;
use App\Models\Transportation\Transportation;

use Illuminate\Support\Facades\DB;



class EloquentTransportationRepository implements  TransportationRepositoryContract
{

    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
           if ($trashed == "true") {
            return Transportation::onlyTrashed()
                ->select("*")
                ->get();
        }


        return Transportation::select("*")
            ->where('status', $status)
            ->get();
    }



    public function update(Transportation $transportation, $input )
    {


        DB::transaction(function() use ($transportation, $input ) {
            if ($transportation->update($input)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now




                $transportation->name = $input['name'] ;

                $transportation->currency_type = $input["currency_type"];

                $transportation->fare_per_hour = $input["fare_per_hour"];

                $transportation->fare_per_km   = $input["fare_per_km"];

                $transportation->waiting_change= $input["waiting_change"];

                $transportation->description =  $input['description'] ;

                $transportation->save();


               // event(new UserUpdated($user));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }





    public function destroy(Transportation $transportation)
    {

        if ($transportation->delete()) {
           // event(new UserDeleted($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }






   public function create($input)
   {


       $transportation = $this->createTransportationStub($input);

       DB::transaction(function() use ($transportation){
           if($transportation->save()){


               //event(new CategoryCreated($category));

               return true;
           }
       });


   }


    private function createTransportationStub($input)
    {
        $transportation                    = new Transportation();


        $transportation->name              = $input['name'];
        $transportation->number            = $input["number"];
        $transportation->fare_per_hour     = $input["fare_per_hour"];
        $transportation->fare_per_km       = $input["fare_per_km"];
        $transportation->waiting_change    = $input["waiting_change"];
        $transportation->description       = $input["description"];

        return $transportation;
    }


    /**
     * @param  Category $user
     * @param  $status
     * @return mixed
     */
    public function mark(Transportation $transportation, $status)
    {
        $transportation->status = $status;


        if($transportation->save()){
            return true;
        }

    }



    /**
     * @param  User $user
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete(Transportation $transportation)
    {
        //Failsafe
        if (is_null($transportation->deleted_at)) {
            throw new GeneralException("This user must be deleted first before it can be destroyed permanently.");
        }

        DB::transaction(function() use ($transportation) {

            if ($transportation->forceDelete()) {
                ///event(new UserPermanentlyDeleted($user));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
        });
    }


    public function restore(Transportation $transportation)
    {
        //Failsafe
        if (is_null($transportation->deleted_at)) {
            throw new GeneralException("This user is not deleted so it can not be restored.");
        }

        if ($transportation->restore()) {
            //event(new UserRestored($category));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }


}