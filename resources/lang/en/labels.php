<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update',
        ],
        'hide' => 'Hide',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'approved'=>'Approve',
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'roles' => 'Roles',
                    'total' => 'user total|users total',
                ],
            ],


        ],
        'users' => [
            'active' => 'Active Users',
            'all_permissions' => 'All Permissions',
            'change_password' => 'Change Password',
            'change_password_for' => 'Change Password for :user',
            'create' => 'Create User',
            'approved'=>'Approved',
            'deactivated' => 'Deactivated Users',
            'deleted' => 'Deleted Users',
            'edit' => 'Edit User',
            'management' => 'User Management',
            'no_permissions' => 'No Permissions',
            'no_roles' => 'No Roles to set.',
            'permissions' => 'Permissions',

            'table' => [
                'confirmed' => 'Confirmed',
                'created' => 'Created',
                'email' => 'E-mail',
                'approved'=>'Approved',
                'phone'=>'Phone',
                'id' => 'ID',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'no_deactivated' => 'No Deactivated Users',
                'no_deleted' => 'No Deleted Users',
                'roles' => 'Roles',
                'total' => 'user total|users total',
            ],
        ],
        'transportations'=>[
            'table'=>[
                'id'=>"id",
                'name'=>"name",
                'description'=>'description',
                'currency_type'=>'currency',
                'fare_per_hour'=>'Price Per Hour',
                'fare_per_km'=>'Price per km',
                'waiting_charge'=>'waiting charge',
                'actions'=>'Actions'
            ],
            'management' => 'transportation Management',
            'active'=>"Transportation",
            'name'=>"Name",
            'currency_type'=>"Currency",
            'fare_per_hour'=>'Price Per Hour',
            'fare_per_km'=>'Price per km',
            'waiting_change'=>'waiting_change',
            'description'=>"Description",
            "create"=>"Create transportation",
            "edit"=>"Edit transportation",
            "deleted"=>"transportation Deleted"
        ],

        'contacts'=>[
            'table'=>[
                'id'=>"id",
                'name'=>"name",
                'mobile'=>'mobile',
                'email'=>'email',
                'subject'=>'subject',
                'created_at'=>'Created',
                'actions'=>'Actions'
            ],
            'management' => 'Contact Management',
            'active'=>"Contact",
            'name'=>"Name",
            'mobile'=>"mobile",
            'email'=>'Email',
            'subject'=>'subject',

            "create"=>"Create Contact",
            "edit"=>"Edit Contact",
            "deleted"=>"Contact Deleted"
        ],

        'menus'=>[
            'table'=>[
                'id'=>"id",
                'name'=>"name",
                'description'=>'description',
                'actions'=>'Actions'
            ],
            'management' => 'Menu Management',
            'active'=>"Menu",
            'name'=>"Name",
            'description'=>"Description",
            "create"=>"Create Menu",
            "edit"=>"Edit Menu",
            "deleted"=>"Menu Deleted"
        ],


        'rides'=>[
            'table'=>[
                'id'=>"id",
                'name'=>"name",
                'description'=>'description',
                'actions'=>'Actions'
            ],
            'management' => 'rides Management',
            'active'=>"rides",
            'name'=>"Name",
            'description'=>"Description",
            "create"=>"Create rides",
            "edit"=>"Edit rides",
            "deleted"=>"rides Deleted"
        ],


        'items'=>[
            'table'=>[
                'id'=>"id",
                'name'=>"name",
                'description'=>'description',
                'actions'=>'Actions'
            ],
            'management' => 'Item Management',
            'active'=>"Item",
            'name'=>"Name",
            'description'=>"Description",
            "create"=>"Create Item",
            "edit"=>"Edit Item",
            "deleted"=>"Item Deleted"
        ]
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
