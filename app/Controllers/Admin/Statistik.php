<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SurveiModel;

class Statistik extends BaseController
{
    public function index()
    {
        if (!session()->get('is_admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $surveiModel = new SurveiModel();

        // Total responden
        $totalResponden = $surveiModel->countAllResults();

        // Rata-rata kepuasan per pertanyaan
        $avgKepuasan = [
            'pertanyaan1' => $surveiModel->selectAvg('pertanyaan1')->first()['pertanyaan1'] ?? 0,
            'pertanyaan2' => $surveiModel->selectAvg('pertanyaan2')->first()['pertanyaan2'] ?? 0,
            'pertanyaan3' => $surveiModel->selectAvg('pertanyaan3')->first()['pertanyaan3'] ?? 0,
            'pertanyaan4' => $surveiModel->selectAvg('pertanyaan4')->first()['pertanyaan4'] ?? 0,
        ];

        // Hitung jumlah puas vs tidak puas (3-4 = puas, 1-2 = tidak puas)
        $builder = $surveiModel->builder();
        $puas = $builder->where('pertanyaan1 >=', 3)
                        ->where('pertanyaan2 >=', 3)
                        ->where('pertanyaan3 >=', 3)
                        ->where('pertanyaan4 >=', 3)
                        ->countAllResults();

        $tidakPuas = $totalResponden - $puas;

        // Data distribusi jawaban per pertanyaan
        $dataDistribusi = [];
        for ($i = 1; $i <= 4; $i++) {
            $pertanyaan = 'pertanyaan'.$i;
            $rows = $surveiModel->select("$pertanyaan, COUNT(*) as jumlah")
                                ->groupBy($pertanyaan)
                                ->get()
                                ->getResultArray();
            $dataDistribusi[$pertanyaan] = $rows;
        }

        // Kirim ke view
        return view('admin/statistik', [
            'totalResponden' => $totalResponden,
            'avgKepuasan'    => $avgKepuasan,
            'puas'           => $puas,
            'tidakPuas'      => $tidakPuas,
            'dataDistribusi' => $dataDistribusi,
        ]);
    }
}
