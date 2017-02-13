<?php namespace App\Repositories\Backend\Contact;



use App\Models\Contact\Contact;

interface ContactRepositoryContract{

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
    public function update(Contact $contact, $input );





    /**
     * @param  User $user
     * @return mixed
     */
    public function destroy(Contact $contact);



    public function restore(Contact $contact);


       /**
        * @param  Category $user
        * @param  $status
        * @return mixed
        */
    public function mark(Contact $contact, $status);




    /**
     * @param  Category $user
     * @return mixed
     */
    public function delete(Contact $contact);


}