<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

public $post_api = [
    'nim' => [
        'rules' => 
        'required|is_unique[mahasiswa.nim]'
    ],

    'nama' => [
        'rules' => 'required'
    ],

    'jenis_kelamin' => [
        'rules' => 'required'
    ],

    'no_telp' => [
        'rules' => 'required'
    ],

    'tanggal_lahir' => [
        'rules' => 'required'
    ],

    'alamat' => [
        'rules' => 'required'
    ],
];

public $update_api = [
    'nim' => [
        'rules' => 'required'
        
    ],

    'nama' => [
        'rules' => 'required'
    ],

    'jenis_kelamin' => [
        'rules' => 'required'
    ],

    'no_telp' => [
        'rules' => 'required'
    ],

    'tanggal_lahir' => [
        'rules' => 'required'
    ],

    'alamat' => [
        'rules' => 'required'
    ],
];



}