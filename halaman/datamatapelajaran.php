<?php include("inc_header.php"); ?>

<?php
$idmapel = "";
$namamapel = "";

$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from mapel where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal hapus data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from mapel where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $idmapel = $r1['idmapel'];
    $namamapel = $r1['namamapel'];

    if ($idmapel == '') {
        $error = "Data tidak ditemukan";
    }
}

//create
if (isset($_POST['simpan'])) {
    $idmapel = $_POST['idmapel'];
    $namamapel = $_POST['namamapel'];

    if ($idmapel && $namamapel) {
        if ($op == 'edit') { //update
            $sql1 = "update mapel set idmapel = '$idmapel', namamapel = '$namamapel' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil update";
            } else {
                $error = "Data gagal update";
            }
        } else { //insert
            $sql1 = "insert into mapel(idmapel, namamapel) values ('$idmapel', '$namamapel')";
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
            Create / Edit Data Mata Pelajaran
        </div>
        <div class="card-body">
            <?php
            if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                header("refresh:5;url=datamatapelajaran.php");
            }
            ?>
            <?php
            if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                header("refresh:5;url=datamatapelajaran.php");
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="idmapel" class="col-sm-2 col-form-label">ID Mata Pelajaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="idmapel" name="idmapel"
                            value="<?php echo $idmapel ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namamapel" class="col-sm-2 col-form-label">Nama Mapel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namamapel" name="namamapel"
                            value="<?php echo $namamapel ?>">
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
            Data Mata Pelajaran
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Mata Pelajaran</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                    </tr>
                <tbody>
                    <?php
                    $sql2 = "select * from mapel order by id desc";
                    $q2 = mysqli_query($koneksi, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id = $r2['id'];
                        $idmapel = $r2['idmapel'];
                        $namamapel = $r2['namamapel'];
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $urut++ ?>
                            </th>
                            <td scope="row">
                                <?php echo $idmapel ?>
                            </td>
                            <td scope="row">
                                <?php echo $namamapel ?>
                            </td>
                            <td scope="row">
                                <a href="datamatapelajaran.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                        class="btn btn-warning">Edit</button>
                                </a>
                                <a href="datamatapelajaran.php?op=delete&id=<?php echo $id ?>"
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