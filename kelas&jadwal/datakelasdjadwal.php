<?php include("headerkelasdjadwal.php"); ?>
<!-- Container -->
<div class="container">
    <div class="row my-2">
        <div class="col-md">
            <h3 class="text-center fw-bold text-uppercase">Data Jadwal</h3>
            <hr>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <a href="addkelasdjadwal.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
            <a href="exportkelasdjadwal.php" target="_blank" class="btn btn-success ms-1"><i
                    class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md">
            <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Kelas</th>
                        <th>Mapel</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Guru Mapel</th>
                        <th>Tanggal UTS</th>
                        <th>Tanggal UAS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kelasdjadwal as $row): ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $row['id']; ?>
                            </td>
                            <td>
                                <?= $row['kelas']; ?>
                            </td>
                            <td>
                                <?= $row['mapel']; ?>
                            </td>
                            <td>
                                <?= $row['hari']; ?>
                            </td>
                            <td>
                                <?= $row['waktu']; ?>
                            </td>
                            <td>
                                <?= $row['guru_mapel']; ?>
                            </td>
                            <td>
                                <?= $row['tgl_uts']; ?>
                            </td>
                            <td>
                                <?= $row['tgl_uas']; ?>
                            </td>
                            <td>
                                <a href="ubahkelasdjadwal.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"
                                    style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                <a href="hapuskelasdjadwal.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                                    style="font-weight: 600;"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['id']; ?> ?');"><i
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
                <h5 class="modal-title fw-bold text-uppercase" id="detail">Detail Data Kelas & Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="detail-kelasdjadwal">
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
    });
</script>
</body>

</html>