<?php

namespace App\Controllers;

use App\Models\SurveiModel;
use App\Models\TestimoniModel;

class Survei extends BaseController
{
    public function index()
    {
        $surveiModel = new SurveiModel();
        $testimoniModel = new TestimoniModel();

        // Hitung total data untuk statistik
        $total = $surveiModel->countAll();

        $sangatPuas = $surveiModel->where('pertanyaan1', 4)->countAllResults()
                    + $surveiModel->where('pertanyaan2', 4)->countAllResults()
                    + $surveiModel->where('pertanyaan3', 4)->countAllResults()
                    + $surveiModel->where('pertanyaan4', 4)->countAllResults();

        $puas = $surveiModel->where('pertanyaan1', 3)->countAllResults()
                + $surveiModel->where('pertanyaan2', 3)->countAllResults()
                + $surveiModel->where('pertanyaan3', 3)->countAllResults()
                + $surveiModel->where('pertanyaan4', 3)->countAllResults();

        $tidakPuas = $surveiModel->where('pertanyaan1', 2)->countAllResults()
                    + $surveiModel->where('pertanyaan2', 2)->countAllResults()
                    + $surveiModel->where('pertanyaan3', 2)->countAllResults()
                    + $surveiModel->where('pertanyaan4', 2)->countAllResults();

        $sangatTidakPuas = $surveiModel->where('pertanyaan1', 1)->countAllResults()
                        + $surveiModel->where('pertanyaan2', 1)->countAllResults()
                        + $surveiModel->where('pertanyaan3', 1)->countAllResults()
                        + $surveiModel->where('pertanyaan4', 1)->countAllResults();

        $data = [
            'total' => $total,
            'sangatPuas' => $sangatPuas,
            'puas' => $puas,
            'tidakPuas' => $tidakPuas,
            'sangatTidakPuas' => $sangatTidakPuas,
            'testimoni' => $testimoniModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('beranda', $data);
    }

    public function submit()
    {
        $model = new SurveiModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'pertanyaan1' => $this->request->getPost('pertanyaan1'),
            'pertanyaan2' => $this->request->getPost('pertanyaan2'),
            'pertanyaan3' => $this->request->getPost('pertanyaan3'),
            'pertanyaan4' => $this->request->getPost('pertanyaan4'),
            
        ];

        if ($model->insert($data)) {
            return redirect()->to('/')->with('success', 'Terima kasih, survei Anda telah berhasil dikirim.');
        } else {
            return redirect()->to('/')->with('error', 'Maaf, terjadi kesalahan saat menyimpan survei.');
        }
    }

    
}
