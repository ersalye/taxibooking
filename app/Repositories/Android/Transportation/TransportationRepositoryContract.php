<?php



    namespace App\Repositories\Android\Transportation;


    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface TransportationRepositoryContract
{


   public function getTaxi($inputs);

   public function updateTaxi($inputs);


}