    </div><!-- /.content-wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 5 -->
    <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>

    <!-- Custom AJAX Script -->
    <script>
        $(document).ready(function () {
            // Contoh: reload data tabel survei tanpa refresh halaman
            // Sesuaikan id/route sesuai kebutuhan
            function loadData() {
                $.ajax({
                    url: "<?= base_url('admin/survei/getData') ?>",
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        // contoh: render ulang isi tabel
                        $("#dataSurvei").html(data.html);
                    },
                    error: function () {
                        console.error("Gagal memuat data survei.");
                    }
                });
            }

            // kalau mau auto-load tiap kali halaman dibuka
            // loadData();

            // kalau mau reload manual, panggil dengan tombol
            $("#reloadButton").on("click", function () {
                loadData();
            });
        });
    </script>

</body>
</html>
