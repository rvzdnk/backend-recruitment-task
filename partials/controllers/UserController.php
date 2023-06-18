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
        if (isset($_POST['btn--delete'])){
            $userId = $_POST['btn--delete'];
            $users = $this->deleteUser($userId);
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
            $users = $this->addNewUser($entryData);
            return $users;
        }
        else{
            $users = $this->getAllUsers();
            return $users;
        };
    }

    public function getAllUsers(){
        return json_decode(file_get_contents($this->dataPath), true);
    }

    public function addNewUser($entryData){
        $users = $this->getAllUsers();
        $newUserArray = $this->userModel->newUser($entryData);
        $users[] = $newUserArray;
        return $users;
    }

    public function deleteUser($userId){
        $users = $this->getAllUsers();
        foreach ($users as $index => $user) {
            if ($user['id'] == $userId) {
                array_splice($users, $index, 1);
                file_put_contents($this->dataPath, json_encode($users));
                break;
            }
        }
        return $users;
    }
}
?>