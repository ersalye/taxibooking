<?php



    namespace App\Repositories\Backend\AUser;
    use App\Models\Access\User\User;


    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
     *
 */
interface UserRepositoryContract
{


    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 0, $trashed = false,$filter=null);


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
    public function update(User $user, $input );





    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function destroy(User $user);



    public function restore(User $user);


    /**
     * @param  Ride $ride
     * @param  $status
     * @return mixed
     */
    public function mark(User $user, $status);




    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function delete(User $user);

}