<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Statistik Survei</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="container mt-4">

    <h2 class="mb-4">Statistik Survei Kepuasan</h2>

    <!-- Bagian Atas: Summary Cards -->
    <div class="row text-center mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Total Responden</h5>
                    <h3><?= $totalResponden ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Rata-rata Kepuasan</h5>
                    <h3><?= number_format(($avgKepuasan['pertanyaan1'] + $avgKepuasan['pertanyaan2'] + $avgKepuasan['pertanyaan3'] + $avgKepuasan['pertanyaan4'])/4, 2) ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <h5>Puas</h5>
                    <h3><?= $puas ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5>Tidak Puas</h5>
                    <h3><?= $tidakPuas ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Tengah: Grafik -->
    <div class="row">
        <div class="col-md-6">
            <canvas id="barChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <!-- Bagian Bawah: Tabel Rekap -->
    <h4 class="mt-5">Rekap Jawaban</h4>
    <table class="table table-hover table-striped align-middle">
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
                        <td><?= $row['jumlah'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Analisis Singkat -->
    <div class="alert alert-secondary mt-4">
        <strong>Analisis:</strong> 
        Dari total <?= $totalResponden ?> responden, sebanyak <?= $puas ?> (<?= round(($puas/$totalResponden)*100,1) ?>%) merasa puas,
        sementara <?= $tidakPuas ?> (<?= round(($tidakPuas/$totalResponden)*100,1) ?>%) merasa tidak puas.
    </div>

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
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
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
                    backgroundColor: ['#28a745', '#dc3545']
                }]
            }
        });
    </script>

</body>
</html>
<?= $this->endSection() ?>