<?php include("headerguru.php");
// Mengambil data dari nip dengan fungsi get
$nip = $_GET['nip'];

// Mengambil data dari table guru dari nip yang tidak sama dengan 0
$guru = query("SELECT * FROM guru WHERE nip = $nip")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data guru berhasil diubah!');
                document.location.href = 'dataguru.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data guru gagal diubah!');
            </script>";
    }
}


?>

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data guru</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="gambarLama" value="<?= $guru['gambar']; ?>">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="number" class="form-control w-50" id="nip" value="<?= $guru['nip']; ?>" name="nip" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control w-50" id="nama" value="<?= $guru['nama']; ?>" name="nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tmpt_Lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control w-50" id="tmpt_Lahir" value="<?= $guru['tmpt_Lahir']; ?>" name="tmpt_Lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_Lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control w-50" id="tgl_Lahir" value="<?= $guru['tgl_Lahir']; ?>" name="tgl_Lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" id="Laki-Laki" value="Laki-Laki" <?php if ($guru['jekel'] == 'Laki-Laki') { ?> checked='' <?php } ?>>
                            <label class="form-check-label" for="Laki-Laki">Laki - Laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" id="Perempuan" value="Perempuan" <?php if ($guru['jekel'] == 'Perempuan') { ?> checked='' <?php } ?>>
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control w-50" id="agama" value="<?= $guru['agama']; ?>" name="agama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control w-50" id="no_hp" value="<?= $guru['no_hp']; ?>" name="no_hp" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control w-50" id="email" value="<?= $guru['email']; ?>" name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar <i>(Saat ini)</i></label> <br>
                        <img src="../img/<?= $guru['gambar']; ?>" width="50%" style="margin-bottom: 10px;">
                        <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control w-50" id="alamat" rows="5" name="alamat" autocomplete="off"><?= $guru['alamat']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="Aktif" value="Aktif" <?php if ($guru['status'] == 'Aktif') { ?> checked='' <?php } ?>>
                            <label class="form-check-label" for="Laki-Laki">Aktif</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="Tidak Aktif" value="Tidak Aktif" <?php if ($guru['status'] == 'Tidak Aktif') { ?> checked='' <?php } ?>>
                            <label class="form-check-label" for="Tidak Aktif">Tidak Aktif</label>
                        </div>
                    </div>
                    <hr>
                    <a href="dataguru.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->
</body>

</html>