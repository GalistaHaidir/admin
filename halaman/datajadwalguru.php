<?php include("inc_header.php"); ?>

<?php
$idjadwalguru = "";
$nip = "";
$idmapel = "";
$namakelas = "";
$hari = "";
$jam = "";

$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from jadwalguru where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal hapus data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from jadwalguru where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $idjadwalguru = $r1['idjadwalguru'];
    $nip = $r1['nip'];
    $idmapel = $r1['idmapel'];
    $namakelas = $r1['namakelas'];
    $hari = $r1['hari'];
    $jam = $r1['jam'];


    if ($namakelas == '') {
        $error = "Data tidak ditemukan";
    }
}

//create
if (isset($_POST['simpan'])) {
    $idjadwalguru = $_POST['idjadwalguru'];
    $nip = $_POST['nip'];
    $idmapel = $_POST['idmapel'];
    $namakelas = $_POST['namakelas'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];

    if ($idjadwalguru && $nip && $idmapel && $namakelas && $hari && $jam) {
        if ($op == 'edit') { //update
            $sql1 = "update jadwalguru set idjadwalguru = '$idjadwalguru', nip = '$nip', idmapel = '$idmapel', namakelas = '$namakelas', hari = '$hari', jam = '$jam' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil update";
            } else {
                $error = "Data gagal update";
            }
        } else { //insert
            $sql1 = "insert into jadwalguru(idjadwalguru,nip,idmapel,namakelas,hari,jam) values ('$idjadwalguru', '$nip', '$idmapel', '$namakelas', '$hari', '$jam')";
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
            Create / Edit Data Kelas
        </div>
        <div class="card-body">
            <?php
            if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                header("refresh:5;url=datakelas.php");
            }
            ?>
            <?php
            if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                header("refresh:5;url=datakelas.php");
            }
            ?>
            <form action="" method="POST">
            <div class="mb-3 row">
                    <label for="idjadwalguru" class="col-sm-2 col-form-label">ID Jadwal Guru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="idjadwalguru" name="idjadwalguru" value="<?php echo $idjadwalguru ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $nip ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="idmapel" class="col-sm-2 col-form-label">ID Mapel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="idmapel" name="idmapel" value="<?php echo $idmapel ?>">
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
                        <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="hari" id="hari">
                                <option value="">- Pilih Hari -</option>
                                <option value="Senin" <?php if ($hari == "Senin")
                                echo "selected" ?>>Senin</option>
                                <option value="Selasa" <?php if ($hari == "Selasa")
                                echo "selected" ?>>Selasa</option>
                                <option value="Rabu" <?php if ($hari == "Rabu")
                                echo "selected" ?>>Rabu</option>
                                <option value="Kamis" <?php if ($hari == "Kamis")
                                echo "selected" ?>>Kamis</option>
                                <option value="Jum'at" <?php if ($hari == "Jum'at")
                                echo "selected" ?>>Jum'at</option>
                                <option value="Sabtu" <?php if ($hari == "Sabtu")
                                echo "selected" ?>>Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jam" id="jam">
                                <option value="">- Pilih Jam -</option>
                                <option value="Jam Ke-1" <?php if ($jam == "Jam Ke-1")
                                echo "selected" ?>>Jam Ke-1</option>
                                <option value="Jam Ke-2" <?php if ($jam == "Jam Ke-2")
                                echo "selected" ?>>Jam Ke-2</option>
                                <option value="Jam Ke-3" <?php if ($jam == "Jam Ke-3")
                                echo "selected" ?>>Jam Ke-3</option>
                                <option value="Jam Ke-4" <?php if ($jam == "Jam Ke-4")
                                echo "selected" ?>>Jam Ke-4</option>
                                <option value="Jam Ke-5" <?php if ($jam == "Jam Ke-5")
                                echo "selected" ?>>Jam Ke-5</option>
                                <option value="Jam Ke-6" <?php if ($jam == "Jam Ke-6")
                                echo "selected" ?>>Jam Ke-6</option>
                                <option value="Jam Ke-7" <?php if ($jam == "Jam Ke-7")
                                echo "selected" ?>>Jam Ke-7</option>
                                <option value="Jam Ke-8" <?php if ($jam == "Jam Ke-8")
                                echo "selected" ?>>Jam Ke-8</option>
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
        Data Jadwal Guru
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Jadwal Guru</th>
                    <th scope="col">NIP Guru</th>
                    <th scope="col">ID Mapel</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam</th>
                </tr>
            <tbody>
                <?php
                $sql2 = "select * from jadwalguru order by id desc";
                $q2 = mysqli_query($koneksi, $sql2);
                $urut = 1;
                while ($r2 = mysqli_fetch_array($q2)) {
                    $id = $r2['id'];
                    $idjadwalguru = $r2['idjadwalguru'];
                    $nip = $r2['nip'];
                    $idmapel = $r2['idmapel'];
                    $namakelas = $r2['namakelas'];
                    $hari = $r2['hari'];
                    $jam = $r2['jam'];

                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $urut++ ?>
                        </th>
                        <td scope="row">
                            <?php echo $idjadwalguru ?>
                        </td>
                        <td scope="row">
                            <?php echo $nip ?>
                        </td>
                        <td scope="row">
                            <?php echo $idmapel ?>
                        </td>
                        <td scope="row">
                            <?php echo $namakelas ?>
                        </td>
                        <td scope="row">
                            <?php echo $hari ?>
                        </td>
                        <td scope="row">
                            <?php echo $jam ?>
                        </td>
                        <td scope="row">
                            <a href="datajadwalguru.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                    class="btn btn-warning">Edit</button>
                            </a>
                            <a href="datajadwalguru.php?op=delete&id=<?php echo $id ?>"
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