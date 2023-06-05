<?php
// Memanggil atau membutuhkan file function.php
require 'functionguru.php';

// Menampilkan semua data dari table guru berdasarkan nip secara Descending
$guru = query("SELECT * FROM guru ORDER BY nip DESC");

// Membuat nama file
$filename = "data guru-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data guru.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat dan Tanggal Lahir</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Nomor HP</th>
            <th>E-Mail</th>
            <th>Alamat</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($guru as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nip']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['tmpt_Lahir']; ?>, <?= $row['tgl_Lahir']; ?></td>
                <?php
                $now = time();
                $timeTahun = strtotime($row['tgl_Lahir']);
                $setahun = 31536000;
                $hitung = ($now - $timeTahun) / $setahun;
                ?>
                <td><?= floor($hitung); ?> Tahun</td>
                <td><?= $row['jekel']; ?></td>
                <td><?= $row['agama']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>