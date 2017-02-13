<?php
 namespace App\Models\Hotel;



 use Illuminate\Database\Eloquent\Model;
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:18 PM
 */




 class Hotel  extends Model {





  // filable
  protected $fillable = ['name','price','address'];


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





}