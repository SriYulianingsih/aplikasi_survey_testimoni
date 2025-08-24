<?= $this->extend('survei/layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Daftar Testimoni</h3>
    <div cclass="card-body">
        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($testimonis) && is_array($testimonis)): ?>
                    <?php $i = 1; foreach($testimonis as $testimoni): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($testimoni['nama'] ?: 'Anonim') ?></td>
                        <td><?= esc($testimoni['pesan']) ?></td>
                        <td><?= date('d M Y H:i', strtotime($testimoni['created_at'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Belum ada testimoni</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

