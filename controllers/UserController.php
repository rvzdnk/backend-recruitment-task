<?php

require_once './models/UserModel.php';

class UserController {

    private $dataPath = './dataset/users.json';
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getAllUsers(){
        try{
            return json_decode(file_get_contents($this->dataPath), true);
        }
        catch (Exception $e){
            throw new Exception('Error' . $e->getCode() .":". $e->getMessage());
        }
    }

    public function saveJsonFile($data){
        try{
            file_put_contents($this->dataPath, json_encode($data));
        }
        catch (Exception $e){
            throw new Exception('Error' . $e->getCode() .":". $e->getMessage());
        }
    }

    public function addNewUser($entryData){
        try{
            $users = $this->getAllUsers();
            $newUserArray = $this->userModel->newUser($entryData);
            array_push($users, $newUserArray);
            $this->saveJsonFile($users);
            return $users;
        }
        catch (Exception $e){
            throw new Exception('Error' . $e->getCode() .":". $e->getMessage());
        }
    }

    public function deleteUser($userId){
        
        try{
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
        catch (Exception $e){
            throw new Exception('Error' . $e->getCode() .":". $e->getMessage());
        }
    }
}
?>