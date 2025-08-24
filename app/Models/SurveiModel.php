<?php

namespace App\Models;
use CodeIgniter\Model;

class SurveiModel extends Model
{
    protected $table = 'survei';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'pertanyaan1', 'pertanyaan2', 'pertanyaan3', 'pertanyaan4','created_at'];

    public function getAll()
    {
        return $this->findAll();
    }
}
