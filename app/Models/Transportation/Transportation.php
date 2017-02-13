<?php
 namespace App\Models\Transportation;



 use App\Models\Transportation\Traits\Attribute\TransportationAttribute;
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


 class Transportation  extends Model {
  // use triate attribute and slug
 use TransportationAttribute  , Sluggable , SoftDeletes , TransportationRelationship;




  // filable
  protected $fillable = ['name', 'description','currency_type'];


  /**
   * @var array
   */
  protected $dates = ['deleted_at'];


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



  /**
   * @param array $attributes
   */
  public function __construct(array $attributes = [])
  {
   parent::__construct($attributes);
   $this->table = config('model.tables.transportation');
  }


}