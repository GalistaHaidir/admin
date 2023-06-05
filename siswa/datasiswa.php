<?php include("headersiswa.php"); ?>
<!-- Container -->
<div class="container">
    <div class="row my-2">
        <div class="col-md">
            <h3 class="text-center fw-bold text-uppercase">Data Siswa</h3>
            <hr>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <a href="addsiswa.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
            <a href="exportsiswa.php" target="_blank" class="btn btn-success ms-1"><i
                    class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md">
            <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Agama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($siswa as $row): ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $row['nama']; ?>
                            </td>
                            <td>
                                <?= $row['jekel']; ?>
                            </td>
                            <?php
                            $now = time();
                            $timeTahun = strtotime($row['tgl_Lahir']);
                            $setahun = 31536000;
                            $hitung = ($now - $timeTahun) / $setahun;
                            ?>
                            <td>
                                <?= floor($hitung); ?> Tahun
                            </td>
                            <td>
                                <?= $row['agama']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['nis']; ?>"
                                    style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Detail</button> |

                                <a href="ubahsiswa.php?nis=<?= $row['nis']; ?>" class="btn btn-warning btn-sm"
                                    style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                <a href="hapussiswa.php?nis=<?= $row['nis']; ?>" class="btn btn-danger btn-sm"
                                    style="font-weight: 600;"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama']; ?> ?');"><i
                                        class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Close Container -->

<!-- Modal Detail Data -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-uppercase" id="detail">Detail Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="detail-siswa">
            </div>
        </div>
    </div>
</div>
<!-- Close Modal Detail Data -->

<!-- Data Tables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        // Fungsi Table
        $('#data').DataTable();
        // Fungsi Table

        // Fungsi Detail
        $('.detail').click(function () {
            var dataSiswa = $(this).attr("data-id");
            $.ajax({
                url: "detailsiswa.php",
                method: "post",
                data: {
                    dataSiswa,
                    dataSiswa
                },
                success: function (data) {
                    $('#detail-siswa').html(data);
                    $('#detail').modal("show");
                }
            });
        });
        // Fungsi Detail
    });
</script>
</body>

</html>