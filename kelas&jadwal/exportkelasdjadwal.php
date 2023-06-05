<?php
// Memanggil atau membutuhkan file function.php
require 'functionkelasdjadwal.php';

// Menampilkan semua data dari table kelasdjadwal berdasarkan kelas secara Descending
$kelasdjadwal = query("SELECT * FROM kelasdjadwal ORDER BY id DESC");

// Membuat nama file
$filename = "data kelasdjadwal-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Jadwal.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Kelas</th>
            <th>Mapel</th>
            <th>Hari</th>
            <th>Guru Mata Pelajaran</th>
            <th>Tanggal UTS</th>
            <th>Tanggal UAS</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($kelasdjadwal as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['kelas']; ?></td>
                <td><?= $row['mapel']; ?></td>
                <td><?= $row['hari']; ?>, <?= $row['waktu']; ?></td>
                <td><?= $row['guru_mapel']; ?></td>
                <td><?= $row['tgl_uts']; ?></td>
                <td><?= $row['tgl_uas']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>