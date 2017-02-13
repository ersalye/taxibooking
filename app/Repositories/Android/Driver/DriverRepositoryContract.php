<?php



    namespace App\Repositories\Android\Driver;


    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface DriverRepositoryContract
{



    public function getStatus($inputs);

    public function updateStatus($inputs);



    public function driverUpdatePassengerMarker($inputs);

    public function driverCancelBookingRequest($inputs);


    public function driverConfirmBookingRequest($inputs);

    public function driverMissedConfirmBookingRequest($inputs);



}