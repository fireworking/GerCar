<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{

    public function retrieved(User $user)
    {
        dd($user);
        foreach($user->typeable->toArray() as $key => $value){
            $user->setAttribute($key, $value);
        }
    }

}