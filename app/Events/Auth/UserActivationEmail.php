<?php

namespace App\Events\Auth;

use App\Interfaces\UserInterface;
use App\User;
use Illuminate\Queue\SerializesModels;

use Illuminate\Foundation\Events\Dispatchable;


class UserActivationEmail
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

}
