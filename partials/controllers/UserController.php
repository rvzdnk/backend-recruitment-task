<?php

require_once '../models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getAllUsers()
    {
        return $this->userModel->getAllUsers();
    }

}

?>