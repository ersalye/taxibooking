<?php
 namespace App\Models\GCM;



 use App\Models\GCM\Traits\Relationship\GCMRelationship;
 use App\Models\Transportation\Traits\Relationship\TransportationRelationship;
 use Illuminate\Database\Eloquent\Model;
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:18 PM
 */

 use Cviebrock\EloquentSluggable\Sluggable;
 use Illuminate\Database\Eloquent\SoftDeletes;


 class GCM  extends Model {

  use GCMRelationship;

  protected $table;

  // filable
  protected $fillable =  ['gcm_regid', 'driver_status',"email","user_type","latitude","longitude"];





  /**
   * @param array $attributes
   */
  public function __construct(array $attributes = [])
  {
   parent::__construct($attributes);
   $this->table = config('model.tables.gcm');
  }


 }