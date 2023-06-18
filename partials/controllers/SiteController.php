<?php

require_once './partials/controllers/UserController.php';

class SiteController {

    private $userController;

    public function __construct()
    {
        $this->userController = new UserController();
    }

    public function handleRequest(){
        $userController = new UserController();
        if (isset($_POST['btn--delete'])){
            $userId = $_POST['btn--delete'];
            $users = $userController->deleteUser($userId);
            return $users;
        }
        elseif(isset($_POST['btn--submit'])){
            $entryData = array(
                'name' => $_POST['name'],
                'username' =>$_POST['username'],
                'email' => $_POST['email'],
                'street' => $_POST['street'],
                'city' => $_POST['city'],
                'zipcode' => $_POST['zipcode'],
                'phone' => $_POST['phone'],
                'company' => $_POST['company'],
            );
            $users = $userController->addNewUser($entryData);
            return $users;
        }
        else{
            $users = $userController->getAllUsers();
            return $users;
        };
    }
}

?>