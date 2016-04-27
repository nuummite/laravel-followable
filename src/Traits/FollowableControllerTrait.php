<?php 

/*
 * This file is part of the mmochetti/laravel-followable.
 *
 * (c) Martin Mochetti <martin.mochetti@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This file is a trait that adds the followable functionality to a controller.
 */

namespace Nuummite\Followable\Traits;

use Nuummite\Followable\FeedMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait FollowableControllerTrait
{

    /**
    * Adds a message to the followable object passed in
    *
    * @param Request    $request
    * @param object     $followable
    *
    * @return array
    */
    public function addMessage(Request $request, $followable)
    {
        $validation = Validator::make([
            'message' => 'required'
        ]);

        if ($validation->passes()) {
            $followable->feed()->save(FeedMessage::create(
                $request->only('message')
            ));

            return ["status" => "success"];
        }

        return ["status" => "fail", "info" => $validation->messages()];
    }
}
