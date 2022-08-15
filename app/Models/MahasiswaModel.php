<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = [
        'nim','nama','jenis_kelamin','no_telp',
        'tanggal_lahir','alamat'
    ];

    protected $returnType = 'App\Entities\Mahasiswa';
    protected $useTimetamps = false;
}