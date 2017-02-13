<?php



    namespace App\Repositories\Android\Ride;


    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface RideRepositoryContract
{


    /*
     *
     *  @return Ride
       @param $request
     * */
    public function save($inputs);

    public function lists($inputs);

}