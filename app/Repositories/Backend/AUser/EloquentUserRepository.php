<?php

namespace App\Repositories\Backend\AUser;





use App\Models\Access\User\User;

class EloquentUserRepository implements UserRepositoryContract
{

    protected $user;


    public function __construct( User $user )
    {

        $this->user =  $user;

    }


    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 0, $trashed = false,$filter=null)
    {
        $fields = [
            "id","app_id","name","gender","email",'password','status',"confirmation_code",
            'created_at', 'updated_at', 'deleted_at','approved','confirmed','available','mobile'
        ];
        $users =null;


        if ($trashed == "true") {
            $users = User::onlyTrashed()
                ->select($fields)
                ->get();
            if($filter!=null){
                $users = User::onlyTrashed()
                    ->select($fields)
                    ->whereHas("roles",function($query) use($filter) {
                        $query->whereName($filter);
                    })
                    ->get();
            }


        } else {
            $users = User::select($fields)
                ->where('status', $status)

                ->get();
            if($filter!=null){
                $users = User::select($fields)
                    ->where('status', $status)
                    ->whereHas("roles",function($query) use($filter) {
                        $query->whereName($filter);
                    })
                    ->get();
            }


        }


        if($filter!=null){

        }
        return $users;

    }

    /**
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param Ride $ride
     *
     * @param $input
     * @return mixed
     */
    public function update(User $user, $input)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function destroy(User $user)
    {
        // TODO: Implement destroy() method.
    }

    public function restore(User $user)
    {
        // TODO: Implement restore() method.
    }

    /**
     * @param  Ride $ride
     * @param  $status
     * @return mixed
     */
    public function mark(User $user,$status)
    {
        // TODO: Implement mark() method.
    }

    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function delete(User $user)
    {
        // TODO: Implement delete() method.
    }
}