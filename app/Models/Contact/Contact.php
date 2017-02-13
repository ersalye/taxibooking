<?php
 namespace App\Models\Contact;


 use App\Models\Contact\Traits\Attribute\ContactAttribute;
 use Illuminate\Database\Eloquent\Model;
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:18 PM
 */

 use Cviebrock\EloquentSluggable\Sluggable;
 use Illuminate\Database\Eloquent\SoftDeletes;


 class Contact
    extends Model {
  // use triate attribute and slug
 use ContactAttribute , SoftDeletes;


 // filable
 protected $fillable = ['name', 'description'];


 /**
  * @var array
  */
 protected $dates = ['deleted_at'];




}