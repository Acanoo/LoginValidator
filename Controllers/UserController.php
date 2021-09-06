<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function register($name, $email, $password)
    {
        $id = (new User())->createUser($name, $email, $password);
        return $id;
    }
}
