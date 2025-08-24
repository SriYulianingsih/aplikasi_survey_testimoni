<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3>Daftar Hasil Survei</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pertanyaan 1</th>
                        <th>Pertanyaan 2</th>
                        <th>Pertanyaan 3</th>
                        <th>Pertanyaan 4</th>
                        <th>Tanggal</th>
                        <th style="width:100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($survei)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($survei as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($row['nama']) ?></td>
                                <td><?= esc($row['email']) ?></td>
                                <td><?= esc($row['pertanyaan1']) ?></td>
                                <td><?= esc($row['pertanyaan2']) ?></td>
                                <td><?= esc($row['pertanyaan3']) ?></td>
                                <td><?= esc($row['pertanyaan4']) ?></td>
                                <td><?= esc($row['created_at']) ?></td>
                                <td>
                                    <!-- Tombol Aksi dengan Icon saja -->
                                    <a href="<?= base_url('admin/survei/read/'.$row['id']) ?>" class="btn btn-sm btn-info" title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="<?= base_url('admin/survei/delete/'.$row['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data survei.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

