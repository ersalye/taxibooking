<?php



    namespace App\Repositories\Backend\Ride;

    use App\Models\Ride\Ride;


    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface RideRepositoryContract
{


    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 0, $trashed = false);


    /**
     * @param $input

     * @return mixed
     */
    public function create($input);




    /**
     * @param Ride $ride
     *
     * @param $input

     * @return mixed
     */
    public function update(Ride $ride, $input );





    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function destroy(Ride $ride);



    public function restore(Ride $ride);


    /**
     * @param  Ride $ride
     * @param  $status
     * @return mixed
     */
    public function mark(Ride $ride, $status);




    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function delete(Ride $ride);

}