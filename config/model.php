<?php


return [

    /*
      * Role model used by Access to create correct relations. Update the role if it is in a different namespace.
     */


    'models' =>[

        # transportation model
        'transportation' => App\Models\Transportation\Transportation::class,
        'gcm'            => App\Models\GCM\GCM::class,

    ],

    'tables' => [
        'user_transportation' => 'user_transportations',
        'transportation' => 'transportations',
        'gcm'            => 'gcm_users',
        'nearest_driver' => 'nearest_drivers',



    ],



];