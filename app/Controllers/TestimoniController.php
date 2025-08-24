<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\SurveiModel;

class TestimoniController extends BaseController
{
    protected $testimoniModel;

    public function __construct()
    {
        $this->testimoniModel = new TestimoniModel();
    }

    public function submit()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'pesan' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/')->withInput()->with('error_testimoni', 'Pesan testimoni minimal 5 karakter.');
        }

        $this->testimoniModel->save([
            'nama'  => $this->request->getPost('nama'),
            'pesan' => $this->request->getPost('pesan')
        ]);

        return redirect()->to('/')->with('success_testimoni', 'Testimoni berhasil dikirim!');
    }
}
