<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SurveiModel;
use App\Models\TestimoniModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $surveiModel = new SurveiModel();
        $testimoniModel = new TestimoniModel();

        $data = [
            'total_survei'    => $surveiModel->countAllResults(),
            'total_testimoni' => $testimoniModel->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
// Method Statistik
    public function statistik()
    {
        $surveiModel = new SurveiModel();

        // Total responden
        $totalResponden = $surveiModel->countAllResults();

        // Rata-rata kepuasan
        $avgKepuasanData = $surveiModel->selectAvg('pertanyaan1')
                                       ->selectAvg('pertanyaan2')
                                       ->selectAvg('pertanyaan3')
                                       ->selectAvg('pertanyaan4')
                                       ->first();

        // Pastikan tidak null
        $avgKepuasan = [
            'pertanyaan1' => $avgKepuasanData['pertanyaan1'] ?? 0,
            'pertanyaan2' => $avgKepuasanData['pertanyaan2'] ?? 0,
            'pertanyaan3' => $avgKepuasanData['pertanyaan3'] ?? 0,
            'pertanyaan4' => $avgKepuasanData['pertanyaan4'] ?? 0,
        ];

        // Jumlah puas (skor 3–4)
        $builder = $surveiModel->builder();
        $puas = $builder->where('pertanyaan1 >=', 3)
                        ->orWhere('pertanyaan2 >=', 3)
                        ->orWhere('pertanyaan3 >=', 3)
                        ->orWhere('pertanyaan4 >=', 3)
                        ->countAllResults(false);

        $tidakPuas = $totalResponden - $puas;

        // Data distribusi untuk chart
        $dataDistribusi = [];
        for ($i = 1; $i <= 4; $i++) {
            $pertanyaan = 'pertanyaan'.$i;
            $rows = $surveiModel->select("$pertanyaan, COUNT(*) as jumlah")
                                ->groupBy($pertanyaan)
                                ->get()
                                ->getResultArray();
            $dataDistribusi[$pertanyaan] = $rows;
        }

        // Kirim data ke view
        return view('admin/statistik', [
            'totalResponden' => $totalResponden,
            'avgKepuasan'    => $avgKepuasan,
            'puas'           => $puas,
            'tidakPuas'      => $tidakPuas,
            'dataDistribusi' => $dataDistribusi,
        ]);
    }

    public function hasil()
{
    $surveiModel = new \App\Models\SurveiModel();
    $data['survei'] = $surveiModel->findAll();

    return view('admin/hasil', $data);
}


    public function testimoni()
    {
        $testimoniModel = new \App\Models\TestimoniModel();
        $data['testimoni'] = $testimoniModel->findAll();

        return view('admin/testimoni', $data);
    }

    public function kelolaAdmin()
    {
        return view('admin/kelola_admin');
 
   }

   public function read($id)
{
    $surveiModel = new \App\Models\SurveiModel();
    $data['survei'] = $surveiModel->find($id);

    if (!$data['survei']) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data survei dengan ID $id tidak ditemukan");
    }

    return view('admin/survei_read', $data);
}

public function delete($id)
{
    $surveiModel = new \App\Models\SurveiModel();
    $surveiModel->delete($id);

    return redirect()->to(base_url('admin/hasil'))->with('success', 'Data survei berhasil dihapus');
}

}
