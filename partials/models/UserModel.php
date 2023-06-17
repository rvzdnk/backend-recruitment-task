<?php
    class UserModel {
        private $dataPath = './dataset/users.json';

        public function getAllUsers(){
            return json_decode(file_get_contents($this->dataPath), true);
        }
    }
?>