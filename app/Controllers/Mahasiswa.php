<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController{
    protected $modelName = 'App\Models\MahasiswaModel';
    protected $format    = 'json';

    public function __construct(){
        $this->validation = 
        \Config\Services::validation();
    }

    public function index(){
        return $this->respond($this->model->findAll());
    }

    public function create(){
        $data = $this->request->getpost();
        $validate = $this->validation->run($data,'post_api');
        $erors = $this->validation->getErrors();

        if ($erors){
            return $this->fail($erors);
        }

        $mahasiswa = new \App\Entities\Mahasiswa();
        $mahasiswa->fill($data);
        $mahasiswa->create_by = 0;
        $mahasiswa->create_date = date('Y-m-d H:i:s');

        if ($this->model->save($mahasiswa)) {
            return $this->respondCreated($mahasiswa, 'Data Created');
        }
    }
    
    public function update($id_mahasiswa = null){
        $data = $this->request->getRawInput();
        $data[$id_mahasiswa] = $id_mahasiswa;

        if(!$this->model->find($id_mahasiswa)){
            return $this->fail('Id Tidak Ditemukan');
        }

        $validate = $this->validation->run($data,'update_api');
        $erors = $this->validation->getErrors();

        if ($erors){
            return $this->fail($erors);
        }

        $mahasiswa = new \App\Entities\Mahasiswa();
        $mahasiswa->fill($data);
        $mahasiswa->update_by = 0;
        $mahasiswa->update_date = date('Y-m-d H:i:s');

        if ($this->model->save($mahasiswa)){
            return $this->respondUpdated($mahasiswa, 'Data Updated');
        }
    }

    public function delete($id_mahasiswa = null){
        if (!$this->model->find($id_mahasiswa)) {
            return $this->fail('id Tidak Ditemukan');
        }

        if (!$this->model->delete($id_mahasiswa)) {
            return $this->respondDeleted(['id_mahasiswa'=> $id_mahasiswa . 'was Deleted']);
        }
    }
}