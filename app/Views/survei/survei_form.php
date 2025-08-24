<div class="container mt-3">

    <form action="<?= base_url('survei/submit') ?>" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Contoh: anda@email.com">
        </div>

        <?php
        $pertanyaan = [
            "Apakah sistem pendaftaran online mudah dipahami dan digunakan oleh Anda sebagai pengguna",
            "Apakah fungsi-fungsi pada sistem pendaftaran online berjalan sesuai dengan yang diharapkan",
            "Apakah tampilan antarmuka sistem pendaftaran online cukup menarik dan tidak membingungkan",
            "Apakah sistem pendaftaran online bekerja dengan stabil tanpa banyak mengalami gangguan atau error",
            "Apakah Anda merasa puas secara keseluruhan setelah menggunakan sistem pendaftaran online ini"
        ];

        $opsi = [
            4 => 'Sangat Setuju',
            3 => 'Setuju',
            2 => 'Tidak Setuju',
            1 => 'Sangat Tidak Setuju'
        ];

        for ($i = 0; $i < count($pertanyaan); $i++) : ?>
            <div class="mb-4">
                <label class="form-label"><?= $i + 1 . '. ' . $pertanyaan[$i] ?></label>
                <?php foreach ($opsi as $nilai => $label) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaan<?= $i + 1 ?>" value="<?= $nilai ?>" id="pertanyaan<?= $i + 1 ?>_<?= $nilai ?>" required>
                        <label class="form-check-label" for="pertanyaan<?= $i + 1 ?>_<?= $nilai ?>">
                            <?= $nilai ?> - <?= $label ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endfor; ?>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-send-fill me-1"></i> Kirim Survei
        </button>
    </form>
</div>
