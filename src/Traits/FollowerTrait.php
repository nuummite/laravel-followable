<?php 

/*
 * This file is part of the mmochetti/laravel-followable.
 *
 * (c) Martin Mochetti <martin.mochetti@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This file is a trait that adds the follower functionality to an object.
 */

namespace Nuummite\Followable\Traits;

use Nuummite\Followable\Followable;
use Illuminate\Support\Collection;

trait FollowerTrait {

    /**
    * Collection of objects being followed by this follower
    *
    * @return Collection
    */
    public function following()
    {
        return collect(
            $this->hasMany(Followable::class)
                ->with('followable')->get()
                ->lists('followable')
        );
    }

    /**
    * Accessor to fake the "following" relation method
    *
    * @return Collection
    */
    public function getFollowingAttribute()
    {
        return $this->following();
    }

    /**
    * Follows a specific followable
    *
    * @return void
    */
    public function follow($followable)
    {
        $followable->followers()->save($this);
        return $this;
    }

    /**
    * Unfollows a specific followable
    *
    * @return void
    */
    public function unfollow($followable)
    {
        $followable->followers()->detach($this);
        return $this;
    }    
}