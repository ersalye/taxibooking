<?php

namespace App\Repositories\Backend\Ride;








use App\Models\Ride\Ride;

class EloquentRideRepository implements RideRepositoryContract
{

    protected $ride;


    public function __construct( Ride $ride )
    {

        $this->ride = $ride;

    }


    /**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 0, $trashed = false)
    {
        $fields = ["id","user_email","driver_email","pickup_location","dropoff_location",'reach_time','travel_time',"distance", 'created_at', 'updated_at', 'deleted_at'];
        if ($trashed == "true") {
            return Ride::onlyTrashed()
                ->select( $fields )
                ->get();
        }
        return Ride::select( $fields )
            ->where('status', $status)
            ->get();
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
    public function update(Ride $ride, $input)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function destroy(Ride $ride)
    {
        // TODO: Implement destroy() method.
    }

    public function restore(Ride $ride)
    {
        // TODO: Implement restore() method.
    }

    /**
     * @param  Ride $ride
     * @param  $status
     * @return mixed
     */
    public function mark(Ride $ride, $status)
    {
        // TODO: Implement mark() method.
    }

    /**
     * @param  Ride $ride
     * @return mixed
     */
    public function delete(Ride $ride)
    {
        // TODO: Implement delete() method.
    }
}