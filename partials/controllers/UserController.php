<?php

require_once './partials/models/UserModel.php';

class UserController {

    private $dataPath = './dataset/users.json';
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel("John", "doe", "alabama", "992","miss","723721");
    }

    public function handleRequest(){
        if(isset($_POST['btn--submit'])){
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
            $users = $this->addNewUser($entryData);
            return $users;
        } else {
            $users = $this->getAllUsers();
            return $users;
        };
    }

    public function getAllUsers(){
        return json_decode(file_get_contents($this->dataPath), true);
    }

    public function addNewUser($entryData){
        $data = json_decode(file_get_contents($this->dataPath), true);
        $newUserArray = $this->userModel->newUser($entryData);
        $data[] = $newUserArray;
        return $data;
    }



}

?>