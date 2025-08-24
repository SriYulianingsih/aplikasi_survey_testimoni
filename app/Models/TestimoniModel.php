<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimoniModel extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'pesan', 'created_at'];
    protected $useTimestamps = false; // karena pakai created_at manual

    public function getAll()
    {
        return $this->findAll();
    }
}
