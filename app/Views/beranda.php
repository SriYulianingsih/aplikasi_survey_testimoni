<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Survei Kepuasan Klinik Cipanas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .section-card {
            background-color: #fafafaff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        .section-title {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #1e73be;
            display: flex;
            align-items: center;
        }
        .section-title i {
            margin-right: 8px;
        }
        .section-divider {
            height: 2px;
            width: 100%; /* garis panjang penuh */
            background-color: #0d6efd;
            border-radius: 2px;
            margin-bottom: 15px;
            margin-top: 15px;
        }
        .card.border-start {
            border-left-width: 5px !important;
            border-radius: 10px;
        }

                /* Efek hover pada semua section-card (form & testimoni) */
        .section-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .section-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Efek hover khusus untuk kartu testimoni */
        .section-card .shadow-sm {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .section-card .shadow-sm:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        }

    </style>
</head>
<body style="background-color: #e4edf8ff;">

<!-- Header Hero -->
<header class="py-5 text-white" style="background: linear-gradient(to right, #1e73be, #2176bd);">
    <div class="container text-center">
        <img src="<?= base_url('uploads/logo_klinik.png') ?>" 
             alt="Logo Klinik Cipanas" 
             width="70" 
             style="background-color: white; border-radius: 10px; padding: 4px;">
        <h2 class="mt-3 fw-bold">Survey Kepuasan & Testimoni Pasien</h2>
        <p class="mb-0">Silahkan berikan penilaian dan testimoni anda terhadap layanan pendaftaran online di Klinik Cipanas</p>
    </div>
</header>

<!-- Flash Message -->
<div class="container mt-4">
    <?php foreach (['success', 'error', 'success_testimoni', 'error_testimoni'] as $type): ?>
        <?php if (session()->getFlashdata($type)) : ?>
            <div class="alert alert-<?= str_contains($type, 'success') ? 'success' : 'danger' ?> alert-dismissible fade show flash-message" role="alert">
                <?= session()->getFlashdata($type) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<!-- Statistik Penilaian -->
<div class="container mt-4 mb-5">
    <div class="card shadow-sm p-4 text-center">
        <div class="row">
            <div class="col-md-3">
                <h3 class="text-primary fw-bold mb-1">
                    <?= $total ? round(($sangatPuas / ($total*5)) * 100) : 0 ?>%
                </h3>
                <div class="text-muted small">Sangat Puas</div>
            </div>
            <div class="col-md-3">
                <h3 class="text-primary fw-bold mb-1">
                    <?= $total ? round(($puas / ($total*5)) * 100) : 0 ?>%
                </h3>
                <div class="text-muted small">Puas</div>
            </div>
            <div class="col-md-3">
                <h3 class="text-primary fw-bold mb-1">
                    <?= $total ? round(($tidakPuas / ($total*5)) * 100) : 0 ?>%
                </h3>
                <div class="text-muted small">Tidak Puas</div>
            </div>
            <div class="col-md-3">
                <h3 class="text-primary fw-bold mb-1">
                    <?= $total ? round(($sangatTidakPuas / ($total*5)) * 100) : 0 ?>%
                </h3>
                <div class="text-muted small">Sangat Tidak Puas</div>
            </div>
        </div>
    </div>
</div>


<!-- Form Survei & Testimoni -->
<div class="container mb-5">
    <div class="row g-4 align-items-stretch">
        <!-- Kolom Survei -->
        <div class="col-md-6">
            <div class="section-card h-100 d-flex flex-column">
                <div class="section-title">
                    <i class="bi bi-clipboard2-check-fill"></i>Form Survei Kepuasan
                </div>
                <div class="section-divider"></div>
                <?= view('survei/survei_form') ?>
            </div>
        </div>

        <!-- Kolom Testimoni (Form + Daftar) -->
        <div class="col-md-6 d-flex flex-column h-100">
            <!-- Form Testimoni -->
            <div class="section-card mb-4">
                <div class="section-title">
                    <i class="bi bi-chat-left-quote-fill"></i>Form Testimoni Pasien
                </div>
                <div class="section-divider"></div>
                <?= view('testimoni_form') ?>
            </div>

            <!-- Daftar Testimoni -->
            <div class="section-card">
                <div class="section-title">
                    <i class="bi bi-chat-left-dots-fill"></i>Testimoni Pasien
                </div>
                <div class="section-divider"></div>
                <?php if (!empty($testimoni)) : ?>
                    <?php foreach ($testimoni as $t) : ?>
                        <div class="border-start border-4 border-primary bg-white rounded shadow-sm p-3 mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-person-circle fs-4 text-primary me-2"></i>
                                <h6 class="mb-0"><?= esc($t['nama']) ?: 'Anonim' ?></h6>
                            </div>
                            <p class="mb-2">
                                <i class="bi bi-chat-dots text-success me-2"></i><?= esc($t['pesan']) ?>
                            </p>
                            <small class="text-muted">
                                <i class="bi bi-calendar-event me-1"></i><?= date('d-m-Y', strtotime($t['created_at'])) ?>
                            </small>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-muted">Belum ada testimoni yang ditampilkan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto close flash message -->
<script>
    setTimeout(() => {
        const alerts = document.querySelectorAll('.flash-message');
        alerts.forEach(alert => {
            let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        });
    }, 5000);
</script>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4 mt-5 shadow-sm">
    <div class="container">
        <p class="mb-1">&copy; <?= date('Y') ?> Klinik Cipanas | Survei kepuasan & Testimoni pasien.</p>
        <small>Developed with <i class="bi bi-heart-fill text-danger"></i> by Mahasiswa Magang Sistem Informasi</small>
    </div>
</footer>

</body>
</html>
