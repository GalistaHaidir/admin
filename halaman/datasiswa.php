<?php include("inc_header.php"); ?>

<?php
$nis = "";
$namasiswa = "";
$namakelas = "";
$noabsen = "";
$jeniskelamin = "";

$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from siswa where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal hapus data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from siswa where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nis = $r1['nis'];
    $namasiswa = $r1['namasiswa'];
    $namakelas = $r1['namakelas'];
    $noabsen = $r1['noabsen'];
    $jeniskelamin = $r1['jeniskelamin'];

    if ($nis == '') {
        $error = "Data tidak ditemukan";
    }
}

//create
if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $namasiswa = $_POST['namasiswa'];
    $namakelas = $_POST['namakelas'];
    $noabsen = $_POST['noabsen'];
    $jeniskelamin = $_POST['jeniskelamin'];


    if ($nis && $namasiswa && $namakelas && $noabsen && $jeniskelamin) {
        if ($op == 'edit') { //update
            $sql1 = "update siswa set nis = '$nis', namasiswa = '$namasiswa', namakelas = '$namakelas', noabsen = '$noabsen', jeniskelamin = '$jeniskelamin' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil update";
            } else {
                $error = "Data gagal update";
            }
        } else { //insert
            $sql1 = "insert into siswa (nis,namasiswa,namakelas,noabsen,jeniskelamin) values ('$nis', '$namasiswa', '$namakelas', '$noabsen', '$jeniskelamin')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "berhasil memasukkan data baru";
            } else {
                $error = "gagal memasukkan data baru";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<div class="mx-auto">
    <!-- memasukkan data-->
    <div class="card">
        <div class="card-header">
            Create / Edit Data Siswa
        </div>
        <div class="card-body">
            <?php
            if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                header("refresh:5;url=datasiswa.php");
            }
            ?>
            <?php
            if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                header("refresh:5;url=datasiswa.php");
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namasiswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namasiswa" name="namasiswa"
                            value="<?php echo $namasiswa ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namakelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="namakelas" id="namakelas">
                            <option value="">- Pilih Kelas -</option>
                                <option value="1-a" <?php if ($namakelas == "1-a")
                                echo "selected" ?>>1-a</option>
                                <option value="1-b" <?php if ($namakelas == "1-b")
                                echo "selected" ?>>1-b</option>
                                <option value="2-a" <?php if ($namakelas == "2-a")
                                echo "selected" ?>>2-a</option>
                                <option value="2-b" <?php if ($namakelas == "2-b")
                                echo "selected" ?>>2-b</option>
                                <option value="3-a" <?php if ($namakelas == "3-a")
                                echo "selected" ?>>3-a</option>
                                <option value="3-b" <?php if ($namakelas == "3-b")
                                echo "selected" ?>>3-b</option>
                                <option value="4-a" <?php if ($namakelas == "4-a")
                                echo "selected" ?>>4-a</option>
                                <option value="4-b" <?php if ($namakelas == "4-b")
                                echo "selected" ?>>4-b</option>
                                <option value="5-a" <?php if ($namakelas == "5-a")
                                echo "selected" ?>>5-a</option>
                                <option value="5-b" <?php if ($namakelas == "5-b")
                                echo "selected" ?>>5-b</option>
                                <option value="6-a" <?php if ($namakelas == "6-a")
                                echo "selected" ?>>6-a</option>
                                <option value="6-b" <?php if ($namakelas == "6-b")
                                echo "selected" ?>>6-b</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="noabsen" class="col-sm-2 col-form-label">Nomor Absen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="noabsen" name="noabsen"
                                value="<?php echo $noabsen ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Perempuan" <?php if ($jeniskelamin == "Perempuan")
                                echo "selected" ?>>Perempuan</option>
                                <option value="Laki-laki" <?php if ($jeniskelamin == "Laki-laki")
                                echo "selected" ?>>Laki-laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <!--mengeluarkan data-->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Siswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Nomor Absen</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql2 = "select * from siswa order by id desc";
                            $q2 = mysqli_query($koneksi, $sql2);
                            $urut = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $id = $r2['id'];
                                $nis = $r2['nis'];
                                $namasiswa = $r2['namasiswa'];
                                $namakelas = $r2['namakelas'];
                                $noabsen = $r2['noabsen'];
                                $jeniskelamin = $r2['jeniskelamin'];

                                ?>
                        <tr>
                            <th scope="row">
                                <?php echo $urut++ ?>
                            </th>
                            <td scope="row">
                                <?php echo $nis ?>
                            </td>
                            <td scope="row">
                                <?php echo $namasiswa ?>
                            </td>
                            <td scope="row">
                                <?php echo $namakelas ?>
                            </td>
                            <td scope="row">
                                <?php echo $noabsen ?>
                            </td>
                            <td scope="row">
                                <?php echo $jeniskelamin ?>
                            </td>
                            <td scope="row">
                                <a href="datasiswa.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                        class="btn btn-warning">Edit</button>
                                </a>
                                <a href="datasiswa.php?op=delete&id=<?php echo $id ?>"
                                    onclick="return confirm('Yakin hapus data?')"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                            }
                            ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>