<?php



    namespace App\Repositories\Android\User;
    use App\Models\Access\User\User;

    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface UserRepositoryContract
{


    public function doLogin($inputs);

    public function create($inputs);

    public function update($inputs);


    public function logOut($inputs);

    public function createOrUpdateApp($inputs);



    public function getDriverStatus($inputs);

    public function updateDriverStatus($inputs);

    // update location driver and save new nearest

    public function updateDriverLocationAndNearest($inputs);

    public function storeNearestDriver($inputs);


    /*
     * @UserUpdateAvailable
     * */
    public function UserUpdateAvailable($inputs);

    public function markerList($inputs);

    public function getProfile($inputs);

    public function updateProfile($inputs);




}