<?php include("headerkelas.php"); ?>
<?php
// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data kelas berhasil ditambahkan!');
                document.location.href = 'datakelas.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data kelas gagal ditambahkan!');
            </script>";
    }
}

?>

<!-- Container -->
<div class="container">
    <div class="row my-2">
        <div class="col-md">
            <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Kelas
            </h3>
        </div>
        <hr>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" class="form-control w-50" id="id" placeholder="Masukkan ID Baru" min="1"
                            name="id" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label>Kelas</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="1a" value="1a">
                            <label class="form-check-label" for="1a">1a</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="1b" value="1b">
                            <label class="form-check-label" for="1b">1b</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="2a" value="2a">
                            <label class="form-check-label" for="2a">2a</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="2b" value="2b">
                            <label class="form-check-label" for="2b">2b</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="3a" value="3a">
                            <label class="form-check-label" for="3a">3a</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="3b" value="3b">
                            <label class="form-check-label" for="3b">3b</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="4a" value="4a">
                            <label class="form-check-label" for="4a">4a</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="4b" value="4b">
                            <label class="form-check-label" for="4b">4b</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="5a" value="5a">
                            <label class="form-check-label" for="5a">5a</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="5b" value="5b">
                            <label class="form-check-label" for="5b">5b</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="6a" value="6a">
                            <label class="form-check-label" for="6a">6a</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nama_kelas" id="6b" value="6b">
                            <label class="form-check-label" for="6b">6b</label>
                        </div>
                    </div>
                    <label for="wali_kelas" class="form-label">Nama Wali Kelas</label>
                    <input type="text" class="form-control form-control-md w-50" id="wali_kelas"
                        placeholder="Masukkan Nama Wali Kelas" name="wali_kelas" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                    <input type="number" class="form-control w-50" id="jumlah_siswa" placeholder="Masukkan Jumlah Siswa"
                        min="1" name="jumlah_siswa" autocomplete="off" required>
                </div>
                <hr>
                <a href="datakelas.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- Close Container -->
</body>

</html>