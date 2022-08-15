<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Mahasiswa extends Entity{
    public function setPassword(String $pass){
        $salt = uniqid('', true);
        $this->attributes['salt'] = $salt;
        $this->attributes['password'] =
        md5($salt,$pass);

        return $this;
    }
}