<?php
/**
* Created by Max Alva
* Date: 2018/10/20
* Time: 14:01:03
*/

require_once 'models/user.model.php';

class UserController {

    static public function create($request) {
        $user = new User();
        $user->setFirstName($request['firstName']);
        $user->setLastName($request['lastName']);
        $user->setEmail($request['email']);
        $user->setPassword($request['password']);
        return $user->save();
    }

}