<?php

namespace App\Models;

class UserModel {
    public $id;
    public $firstName;
    public $lastName;
    public $phone;
    public $address;
    public $role;
    public $email;
    public $year;
    public $department;

    public function __construct($id, $firstName, $lastName, $phone, $role, $year, $department, $address = null, $email = null) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->address = $address??'';
        $this->role = $role;
        $this->email = $email??'';
        $this->year = $year;
        $this->department = $department;
    }

    public static function fromFirestore($doc) {
        return new UserModel(
            $doc['id'],
            $doc['first_name'],
            $doc['last_name'],
            $doc['phone'],
            $doc['role'],
            $doc['year'],
            $doc['Department'],
            $doc['address'] ?? '',
            $doc['email'] ?? ''
        );
    }

    public function toFirestore() {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone' => $this->phone,
            'address' => $this->address,
            'role' => $this->role,
            'email' => $this->email,
            'year' => $this->year,
            'Department' => $this->department,
        ];
    }
}
