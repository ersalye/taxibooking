<?php



    namespace App\Repositories\Android\Hotel;


    /**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface HotelRepositoryContract
{


   public function index($inputs);

   public function update($inputs);

   public function store($inputs);

   public function show($input);

   public function edit($inputs);

   public function delete($inputs);

}