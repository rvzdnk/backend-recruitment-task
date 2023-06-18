<?php

require_once './partials/models/UserModel.php';

class UserController {

    private $dataPath = './dataset/users.json';
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getAllUsers(){
        return json_decode(file_get_contents($this->dataPath), true);
    }

    public function saveJsonFile($data){
        file_put_contents($this->dataPath, json_encode($data));
    }

    public function addNewUser($entryData){
        $users = $this->getAllUsers();
        $newUserArray = $this->userModel->newUser($entryData);
        array_push($users, $newUserArray);
        $this->saveJsonFile($users);
        return $users;
    }

    public function deleteUser($userId){
        $users = $this->getAllUsers();
        foreach ($users as $index => $user) {
            if ($user['id'] == $userId) {
                array_splice($users, $index, 1);
                $this->saveJsonFile($users);
                break;
            }
        }
        return $users;
    }
}
?>