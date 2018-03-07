<?php
namespace App\Policies;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class ProfilePolicy {
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->can('create-profile');
    }

    public function update(User $user)
    {
        if ($user->can('update-post')){
            return true;
        }
        return $user->can('update-own-post') && ($post->user_id == $user->id);
    }

}