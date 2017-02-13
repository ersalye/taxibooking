<?php
 namespace App\Models\Ride;



 use App\Models\Ride\Traits\Attribute\RideAttribute;
 use Carbon\Carbon;
 use Illuminate\Database\Eloquent\Model;


 use Cviebrock\EloquentSluggable\Sluggable;
 use Illuminate\Database\Eloquent\SoftDeletes;


 class Ride extends Model {
  // use triate attribute and slug
 use RideAttribute  , Sluggable ;


 // filable
 protected $fillable = ['slug','user_email','driver_email','name', 'pickup_location','dropoff_location','distance'];

  protected $dates = ['created_at'];

/**
* Return the sluggable configuration array for this model.
*
* @return array
*/
 public function sluggable()
 {
  return [
      'slug' => [
          'source' => 'name'
      ]
  ];
 }



  public function getCreatedAtAttribute($date)
  {

   return  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
  }

 }