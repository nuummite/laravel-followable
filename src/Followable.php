<?php

namespace Nuummite\Followable;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Followable extends Model
{
    /**
    * User that is following the followable object
    *
    * @return User
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Object that is being followed by the user above
    *
    * @return object
    */
    public function followable()
    {
        return $this->morphTo();
    }
}
