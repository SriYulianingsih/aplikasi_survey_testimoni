<?php

namespace App\Controllers;

use App\Models\SurveiModel;
use App\Models\TestimoniModel;

class Home extends BaseController
{
    public function index()
    {
        $surveiModel = new SurveiModel();
        $testimoniModel = new TestimoniModel();

        // Hitung total data survei
        $total = $surveiModel->countAllResults();

        // Hitung jumlah masing-masing skor dari semua kolom pertanyaan
        $sangatPuas = $surveiModel->where('pertanyaan1', 4)->countAllResults(false)
                    + $surveiModel->where('pertanyaan2', 4)->countAllResults(false)
                    + $surveiModel->where('pertanyaan3', 4)->countAllResults(false)
                    + $surveiModel->where('pertanyaan4', 4)->countAllResults(false)
                    + $surveiModel->where('pertanyaan5', 4)->countAllResults(false);

        $puas = $surveiModel->where('pertanyaan1', 3)->countAllResults(false)
                + $surveiModel->where('pertanyaan2', 3)->countAllResults(false)
                + $surveiModel->where('pertanyaan3', 3)->countAllResults(false)
                + $surveiModel->where('pertanyaan4', 3)->countAllResults(false)
                + $surveiModel->where('pertanyaan5', 3)->countAllResults(false);

        $tidakPuas = $surveiModel->where('pertanyaan1', 2)->countAllResults(false)
                    + $surveiModel->where('pertanyaan2', 2)->countAllResults(false)
                    + $surveiModel->where('pertanyaan3', 2)->countAllResults(false)
                    + $surveiModel->where('pertanyaan4', 2)->countAllResults(false)
                    + $surveiModel->where('pertanyaan5', 2)->countAllResults(false);

        $sangatTidakPuas = $surveiModel->where('pertanyaan1', 1)->countAllResults(false)
                        + $surveiModel->where('pertanyaan2', 1)->countAllResults(false)
                        + $surveiModel->where('pertanyaan3', 1)->countAllResults(false)
                        + $surveiModel->where('pertanyaan4', 1)->countAllResults(false)
                        + $surveiModel->where('pertanyaan5', 1)->countAllResults(false);

        // Ambil semua testimoni terbaru
        $testimoni = $testimoniModel->orderBy('created_at', 'DESC')->findAll();

        return view('beranda', [
            'sangatPuas' => $sangatPuas,
            'puas' => $puas,
            'tidakPuas' => $tidakPuas,
            'sangatTidakPuas' => $sangatTidakPuas,
            'total' => $total,
            'testimoni' => $testimoni
        ]);
    }

    public function kirimSurvei()
    {
        $surveiModel = new SurveiModel();
        $data = $this->request->getPost();

        if ($surveiModel->insert($data)) {
            return redirect()->to('/')->with('success', 'Survei berhasil dikirim. Terima kasih!');
        } else {
            return redirect()->to('/')->with('error', 'Gagal mengirim survei.');
        }
    }

    public function kirimTestimoni()
    {
        $testimoniModel = new TestimoniModel();
        $data = $this->request->getPost();

        if (empty($data['pesan'])) {
            return redirect()->to('/')->with('error_testimoni', 'Pesan testimoni tidak boleh kosong.');
        }

        if ($testimoniModel->insert($data)) {
            return redirect()->to('/')->with('success_testimoni', 'Testimoni berhasil dikirim!');
        } else {
            return redirect()->to('/')->with('error_testimoni', 'Gagal menyimpan testimoni.');
        }
    }
}
