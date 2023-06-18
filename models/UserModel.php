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
                'suite' => '',
                'city' => $entryData['city'],
                'zipcode' => $entryData['zipcode'],
                'geo' => [
                    'lat' => '',
                    'lng' => ''
                ]
            ],
            'phone' => $entryData['phone'],
            'website' => '',
            'company' => [
                'name' => $entryData['company'],
                'catchPhrase' => '',
                'bs' => ''
            ]
        ];

        return $newUserArray;
    }
}

// $model = new UserModel();
// $newUser = $model->newUser();