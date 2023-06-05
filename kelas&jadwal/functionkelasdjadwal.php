<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $id = $data['id'];
    $kelas = $data['kelas'];
    $mapel = $data['mapel'];
    $hari = $data['hari'];
    $waktu = $data['waktu'];
    $guru_mapel = $data['guru_mapel'];
    $tgl_uts = $data['tgl_uts'];
    $tgl_uas = $data['tgl_uas'];

    $sql = "INSERT INTO kelasdjadwal VALUES ('$id','$kelas','$mapel','$hari','$waktu','$guru_mapel','$tgl_uts','$tgl_uas')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM kelasdjadwal WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $id = $data['id'];
    $kelas = $data['kelas'];
    $mapel = $data['mapel'];
    $hari = $data['hari'];
    $waktu = $data['waktu'];
    $guru_mapel = $data['guru_mapel'];
    $tgl_uts = $data['tgl_uts'];
    $tgl_uas = $data['tgl_uas'];

    $sql = "UPDATE kelasdjadwal SET id = '$id', kelas = '$kelas', mapel = '$mapel', hari = '$hari', waktu = '$waktu', guru_mapel = '$guru_mapel', tgl_uts = $tgl_uts, tgl_uas = '$tgl_uas' WHERE id = $id";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
