<?php include("headerkelasdjadwal.php");
// Mengambil data dari kelas dengan fungsi get
$id = $_GET['id'];

// Mengambil data dari table kelasdjadwal dari id yang tidak sama dengan 0
$kelasdjadwal = query("SELECT * FROM kelasdjadwal WHERE id = $id")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data kelasdjadwal berhasil diubah!');
                document.location.href = 'datakelasdjadwal.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data kelasdjadwal gagal diubah!');
            </script>";
    }
}


?>

<!-- Container -->
<div class="container">
    <div class="row my-2">
        <div class="col-md">
            <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Jadwal</h3>
        </div>
        <hr>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control form-control-md w-50" id="id"
                        placeholder="Masukkan ID yang sama" name="id" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label>Kelas</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="1a" value="1a">
                        <label class="form-check-label" for="1a">1a</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="1b" value="1b">
                        <label class="form-check-label" for="1b">1b</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="2a" value="2a">
                        <label class="form-check-label" for="2a">2a</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="2b" value="2b">
                        <label class="form-check-label" for="2b">2b</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="3a" value="3a">
                        <label class="form-check-label" for="3a">3a</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="3b" value="3b">
                        <label class="form-check-label" for="3b">3b</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="4a" value="4a">
                        <label class="form-check-label" for="4a">4a</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="4b" value="4b">
                        <label class="form-check-label" for="4b">4b</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="5a" value="5a">
                        <label class="form-check-label" for="5a">5a</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="5b" value="5b">
                        <label class="form-check-label" for="5b">5b</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="6a" value="6a">
                        <label class="form-check-label" for="6a">6a</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelas" id="6b" value="6b">
                        <label class="form-check-label" for="6b">6b</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mapel" class="form-label">Mapel</label>
                    <input type="text" class="form-control form-control-md w-50" id="mapel"
                        placeholder="Masukkan Nama Mapel" name="mapel" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label>Hari</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hari" id="Senin" value="Senin">
                        <label class="form-check-label" for="Senin">Senin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hari" id="Selasa" value="Selasa">
                        <label class="form-check-label" for="Selasa">Selasa</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hari" id="Rabu" value="Rabu">
                        <label class="form-check-label" for="Rabu">Rabu</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hari" id="Kamis" value="Kamis">
                        <label class="form-check-label" for="Kamis">Kamis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hari" id="Jumat" value="Jumat">
                        <label class="form-check-label" for="Jumat">Jumat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hari" id="Sabtu" value="Sabtu">
                        <label class="form-check-label" for="Sabtu">Sabtu</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Waktu</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="07.00-07.45" value="07.00-07.45">
                        <label class="form-check-label" for="07.00-07.45">07.00-07.45</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="07.45-08.40" value="07.45-08.40">
                        <label class="form-check-label" for="07.45-08.40">07.45-08.40</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="08.40-09.25" value="08.40-09.25">
                        <label class="form-check-label" for="08.40-09.25">08.40-09.25</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="09.25-10.10" value="09.25-10.10">
                        <label class="form-check-label" for="09.25-10.10">09.25-10.10</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="10.25-11.10" value="10.25-11.10">
                        <label class="form-check-label" for="10.25-11.10">10.25-11.10</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="11.10-11.50" value="11.10-11.50">
                        <label class="form-check-label" for="11.10-11.50">11.10-11.50</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="12.40-13.25" value="12.40-13.25">
                        <label class="form-check-label" for="12.40-13.25">12.40-13.25</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waktu" id="13.25-14.10" value="13.25-14.10">
                        <label class="form-check-label" for="13.25-14.10">13.25-14.10</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="guru_mapel" class="form-label">Guru Mata Pelajaran</label>
                    <input type="text" class="form-control form-control-md w-50" id="guru_mapel"
                        placeholder="Masukkan Nama Guru Mata Pelajaran" name="guru_mapel" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="tgl_uts" class="form-label">Tanggal UTS</label>
                    <input type="date" class="form-control w-50" id="tgl_uts" name="tgl_uts" required>
                </div>
                <div class="mb-3">
                    <label for="tgl_uas" class="form-label">Tanggal UAS</label>
                    <input type="date" class="form-control w-50" id="tgl_uas" name="tgl_uas" required>
                </div>
                <hr>
                <a href="datakelasdjadwal.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            </form>
        </div>
    </div>
</div>
<!-- Close Container -->
</body>

</html>