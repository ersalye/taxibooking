<?php

namespace App\Models\GCM\Traits\Relationship;

use App\Models\Access\User\SocialLogin;

/**
 * Class UserRelationship
 * @package App\Models\Access\User\Traits\Relationship
 */
trait GCMRelationship
{

    /**
     * @return mixed
     */
    public function user()
    {

        return $this->belongsTo(
            config('auth.providers.users.model')
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