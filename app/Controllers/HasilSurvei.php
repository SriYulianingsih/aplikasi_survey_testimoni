<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SurveiModel;

class HasilSurvei extends BaseController
{
    public function index()
    {
        $model = new SurveiModel();
        $data['survei'] = $model->getAll();

        // Debug: cek apakah datanya sudah masuk
        dd($data['survei']);

        return view('admin/hasil', $data);
    }
}
