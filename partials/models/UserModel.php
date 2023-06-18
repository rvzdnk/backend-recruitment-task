<?php

class UserModel {

    public function newUser($entryData) {

        $newUserArray = [
            'id' => uniqid(),
            'name' => $entryData['name'],
            'username' => $entryData['username'],
            'email' => $entryData['email'],
            'address' => [
                'street' => $entryData['street'],
                'city' => $entryData['city'],
                'zipcode' => $entryData['zipcode'],
            ],
            'phone' => $entryData['phone'],
            'company' => [
                'name' => $entryData['company'],
            ],
        ];

        return $newUserArray;
    }
}

// $model = new UserModel();
// $newUser = $model->newUser();