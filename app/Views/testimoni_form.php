<form action="<?= base_url('testimoni/submit') ?>" method="post" class="mb-4">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama (opsional):</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis nama jika ingin disebut">
    </div>

    <div class="mb-3">
        <label for="pesan" class="form-label">Pesan:</label>
        <textarea class="form-control" id="pesan" name="pesan" placeholder="Tulis testimoni Anda di sini..." required></textarea>
    </div>

    <button type="submit" class="btn btn-success w-100">
        <i class="bi bi-send-fill me-1"></i> Kirim
    </button>
</form>
