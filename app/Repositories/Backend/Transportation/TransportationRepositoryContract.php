<?php namespace App\Repositories\Backend\Transportation;

/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 11:00 PM
 */


use App\Models\Transportation\Transportation;

interface  TransportationRepositoryContract{

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
     * @param $category category
     *
     * @param $input

     * @return mixed
     */
    public function update(Transportation $transportation, $input );





    /**
     * @param  User $user
     * @return mixed
     */
    public function destroy(Transportation $transportation);



    public function restore(Transportation $transportation);


       /**
        * @param  Category $user
        * @param  $status
        * @return mixed
        */
    public function mark(Transportation $transportation, $status);




    /**
     * @param  Category $user
     * @return mixed
     */
    public function delete(Transportation $transportation);


}