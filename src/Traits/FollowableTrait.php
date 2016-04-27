<?php 

/*
 * This file is part of the mmochetti/laravel-followable.
 *
 * (c) Martin Mochetti <martin.mochetti@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This file is a trait that adds the followable functionality to an object.
 */

namespace Nuummite\Followable\Traits;

use Nuummite\Followable\FeedMessage;
use App\User;

trait FollowableTrait
{

    /**
    * Collection of followers attached to this object
    *
    * @return Query|Collection
    */
    public function followers()
    {
        return $this->morphToMany(
            User::class,        // related
            'followable',       // name
            'followables',      // table
            'followable_id',    // foreignKey
            'user_id'           // otherKey
        )->withPivot('created_at', 'updated_at');
    }

    /**
    * Collection of feed messages attached to this object
    *
    * @return Query|Collection
    */
    public function feed()
    {
        return $this->morphMany(FeedMessage::class, 'messageable')
                    ->orderBy('feed_messages.created_at', 'DESC');
    }

    /**
    * Returns weather this followable is being followed by a user
    *
    * @param User $user
    *
    * @return boolean
    */
    public function isBeingFollowedBy(User $user)
    {
        return $this->followers()
                    ->where('user.id', $user->id)
                    ->count() > 0;
    }

    /**
    * Returns weather this followable is being followed by the logged in user
    *
    * @return boolean
    */
    public function isBeingFollowedByLoggedUser()
    {
        return $this->isBeingFollowedBy(Auth::user());
    }

    /**
    * Adds a message to the followable feed
    *
    * @return object
    */
    public function addMessage(FeedMessage $message)
    {
        $this->feed()->save($message);
        return $this;
    }
}
