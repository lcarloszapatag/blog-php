<?php
/**
* Created by Max Alva
* Date: 2018/10/19
* Time: 21:57:34
*/
session_start();
include_once 'helpers/utils.helper.php';
require_once 'controllers/user.controller.php';

if (isset($_POST)) {
    $request = $_POST;

    $request['firstName'] = getValue($_POST['firstName']);
    $request['lastName'] = getValue($_POST['lastName']);
    $request['email'] = getValue($_POST['email']);
    $request['password']= getValue($_POST['password']);

    $_SESSION['register_form'] = $request;

    $errors = array();

    if (!isValidName($request['firstName'])) {
        $errors['firstName'] = true;
    }

    if (!isValidName($request['lastName'])) {
        $errors['lastName'] = true;
    }

    if (!isValidEmail($request['email'])) {
        $errors['email'] = true;
    }

    if (empty($request['password'])) {
        $errors['password'] = true;
    }

    if (count($errors) == 0) {
        unset($_SESSION['errors_register']);
        $request['password'] = encryptPassword($request['password']);
        if (UserController::create($request)) {
            $_SESSION['register_success'] = true;
            unset($_SESSION['register_form']);
        } else {
            $_SESSION['register_success'] = false;
        }
    } else {
        unset($_SESSION['register_success']);
        $_SESSION['errors_register'] = $errors;
    }
    header('Location: index.php');
}
