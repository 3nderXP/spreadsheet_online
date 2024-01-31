<?php

namespace App\Core\Model\Crud;

use App\Core\Model\Entities\User;
use App\Utils\CrudUtils;

class Users extends CrudUtils {

    public function login(User $user, $redirectTo = null) {

        var_dump($user);
        
    }

    public function signUp(User $user, $redirectTo = null) {

        var_dump($user);
        
    }

}