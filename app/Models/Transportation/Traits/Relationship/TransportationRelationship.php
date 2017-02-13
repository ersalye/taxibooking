<?php

namespace App\Models\Transportation\Traits\Relationship;

use App\Models\Access\User\SocialLogin;

/**
 * Class UserRelationship
 * @package App\Models\Access\User\Traits\Relationship
 */
trait TransportationRelationship
{

    /**
     * @return mixed
     */
    public function users()
    {
        dd("working..");
        return $this->belongsToMany(
            config('auth.providers.users.model'),
            config('model.tables.user_transportation'),
            'transportation_id',
            'user_id'
        );
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }
}