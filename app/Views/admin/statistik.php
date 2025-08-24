<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Statistik Survei</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background: #f8f9fa; }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }
        .table th, .table td { vertical-align: middle; }
        @media (max-width: 767px) {
            .row.text-center > div[class^='col-'] { margin-bottom: 1rem; }
            .row > div[class^='col-'] { margin-bottom: 1rem; }
        }
    </style>
</head>
<body class="container py-4">

    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <h2 class="mb-0 fw-bold text-primary">Statistik Survei Kepuasan</h2>
        <span class="badge bg-secondary fs-6">Update: <?= date('d M Y') ?></span>
    </div>

    <!-- Bagian Atas: Summary Cards -->
    <div class="row text-center mb-4 g-3">
        <div class="col-6 col-md-3">
            <div class="card bg-primary text-white shadow h-100">
                <div class="card-body">
                    <h6 class="fw-light">Total Responden</h6>
                    <h2 class="fw-bold mb-0"><i class="bi bi-people"></i> <?= $totalResponden ?></h2>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-success text-white shadow h-100">
                <div class="card-body">
                    <h6 class="fw-light">Rata-rata Kepuasan</h6>
                    <h2 class="fw-bold mb-0"><i class="bi bi-bar-chart"></i> <?= number_format(($avgKepuasan['pertanyaan1'] + $avgKepuasan['pertanyaan2'] + $avgKepuasan['pertanyaan3'] + $avgKepuasan['pertanyaan4'])/4, 2) ?></h2>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-info text-white shadow h-100">
                <div class="card-body">
                    <h6 class="fw-light">Puas</h6>
                    <h2 class="fw-bold mb-0"><i class="bi bi-emoji-smile"></i> <?= $puas ?></h2>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-danger text-white shadow h-100">
                <div class="card-body">
                    <h6 class="fw-light">Tidak Puas</h6>
                    <h2 class="fw-bold mb-0"><i class="bi bi-emoji-frown"></i> <?= $tidakPuas ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Tengah: Grafik -->
    <div class="row g-4">
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white fw-bold">Grafik Rata-rata Skor</div>
                <div class="card-body">
                    <canvas id="barChart" style="min-height:260px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white fw-bold">Grafik Kepuasan</div>
                <div class="card-body">
                    <canvas id="pieChart" style="min-height:260px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Bawah: Tabel Rekap -->
    <h4 class="mt-5 fw-bold">Rekap Jawaban</h4>
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dataDistribusi as $pertanyaan => $data): ?>
                    <?php foreach($data as $row): ?>
                        <tr>
                            <td><?= ucfirst($pertanyaan) ?></td>
                            <td><?= $row[$pertanyaan] ?></td>
                            <td><span class="badge bg-primary fs-6"><?= $row['jumlah'] ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Analisis Singkat -->
    <div class="alert alert-info mt-4 shadow-sm">
        <strong>Analisis:</strong> 
        Dari total <b><?= $totalResponden ?></b> responden, sebanyak <b><?= $puas ?></b> (<span class="text-success fw-bold"><?= round(($puas/$totalResponden)*100,1) ?>%</span>) merasa puas,
        sementara <b><?= $tidakPuas ?></b> (<span class="text-danger fw-bold"><?= round(($tidakPuas/$totalResponden)*100,1) ?>%</span>) merasa tidak puas.
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        // Data Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Pertanyaan1', 'Pertanyaan2', 'Pertanyaan3', 'Pertanyaan4'],
                datasets: [{
                    label: 'Rata-rata Skor',
                    data: [
                        <?= $avgKepuasan['pertanyaan1'] ?>,
                        <?= $avgKepuasan['pertanyaan2'] ?>,
                        <?= $avgKepuasan['pertanyaan3'] ?>,
                        <?= $avgKepuasan['pertanyaan4'] ?>
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(40, 167, 69, 0.7)',
                        'rgba(23, 162, 184, 0.7)',
                        'rgba(220, 53, 69, 0.7)'
                    ],
                    borderRadius: 8,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Data Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Puas', 'Tidak Puas'],
                datasets: [{
                    data: [<?= $puas ?>, <?= $tidakPuas ?>],
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderColor: ['#fff', '#fff'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    tooltip: { enabled: true }
                }
            }
        });
    </script>

</body>
</html>
<?= $this->endSection() ?>