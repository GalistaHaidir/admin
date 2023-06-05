<?php
// Memanggil atau membutuhkan file function.php
require 'functionguru.php';

// Jika dataguru diklik maka
if (isset($_POST['dataguru'])) {
    $output = '';

    // mengambil data guru dari nip yang berasal dari dataguru
    $sql = "SELECT * FROM guru WHERE nip = '" . $_POST['dataguru'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="../img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">nip</th>
                            <td width="60%">' . $row['nip'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tempat dan Tanggal Lahir</th>
                            <td width="60%">' . $row['tmpt_Lahir'] . ', ' . date("d M Y", strtotime($row['tgl_Lahir'])) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jenis Kelamin</th>
                            <td width="60%">' . $row['jekel'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Agama</th>
                            <td width="60%">' . $row['agama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nomor HP</th>
                            <td width="60%">' . $row['no_hp'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">E-Mail</th>
                            <td width="60%">' . $row['email'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Status</th>
                            <td width="60%">' . $row['status'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}