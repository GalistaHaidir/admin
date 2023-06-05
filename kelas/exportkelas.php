<?php
// Memanggil atau membutuhkan file function.php
require 'functionkelas.php';

// Menampilkan semua data dari table kelasdjadwal berdasarkan kelas secara Descending
$kelas = query("SELECT * FROM kelas ORDER BY nama_kelas DESC");

// Membuat nama file
$filename = "data kelas-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Jadwal.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Jumlah Siswa</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($kelas as $row): ?>
            <tr>
                <td>
                    <?= $no++; ?>
                </td>
                <td>
                    <?= $row['nama_kelas']; ?>
                </td>
                <td>
                    <?= $row['wali_kelas']; ?>
                </td>
                <td>
                    <?= $row['jumlah_siswa']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>