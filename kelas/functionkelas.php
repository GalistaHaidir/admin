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
    $nama_kelas = $data['nama_kelas'];
    $wali_kelas = $data['wali_kelas'];
    $jumlah_siswa = $data['jumlah_siswa'];
    
    $sql = "INSERT INTO kelas VALUES ('$id','$nama_kelas','$wali_kelas','$jumlah_siswa')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM kelas WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $id = $data['id'];
    $nama_kelas = $data['nama_kelas'];
    $wali_kelas = $data['wali_kelas'];
    $jumlah_siswa = $data['jumlah_siswa'];

    $sql = "UPDATE kelas SET id = '$id', nama_kelas = '$nama_kelas', wali_kelas = '$wali_kelas', jumlah_siswa = '$jumlah_siswa' WHERE id = $id";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
