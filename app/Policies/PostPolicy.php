<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create-post');
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        if ($user->can('update-post')){
            return true;
        }
        return $user->can('update-own-post') && ($post->user_id == $user->id);
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function delete(User $user, Post $post)
    {
        if ($user->can('delete-post')){
            return true;
        }
        return $user->can('delete-own-post') && ($post->user_id == $user->id);
    }


    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function comment(User $user, Post $post)
    {
        if ($user->can('create-comment') || $user->can('create-limited-comment')){
            return true;
        }
        return false;
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function rate(User $user, Post $post)
    {
        return $post->user_id !== $user->id;
    }
}
