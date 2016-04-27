<?php

namespace Nuummite\Followable;

use Illuminate\Database\Eloquent\Model;

class FeedMessage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
    * Object that owns this feed message
    *
    * @return object
    */
    public function messageable()
    {
        return $this->morphTo();
    }
}
