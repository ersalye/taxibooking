<?php



    namespace App\Repositories\Android\Passenger;

    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface PassengerRepositoryContract
{




   public function updateMarker($inputs);


    public function calculateDistant($inputs);


    // passenger request booking driver
    public function requestBookingDriver($inputs);


    // passenger cancel request booking driver
    public function cancelRequestBooking($inputs);



}