<?php include("inc_header.php"); ?>

<?php
$nip = "";
$namaguru = "";
$jeniskelamin = "";
$nohp = "";
$status = "";

$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from guru where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal hapus data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from guru where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nip = $r1['nip'];
    $namaguru = $r1['namaguru'];
    $jeniskelamin = $r1['jeniskelamin'];
    $nohp = $r1['nohp'];
    $status = $r1['status'];

    if ($nip == '') {
        $error = "Data tidak ditemukan";
    }
}

//create
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $namaguru = $_POST['namaguru'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $nohp = $_POST['nohp'];
    $status = $_POST['status'];

    if ($nip && $namaguru && $jeniskelamin && $nohp && $status) {
        if ($op == 'edit') { //update
            $sql1 = "update guru set nip = '$nip', namaguru = '$namaguru', jeniskelamin = '$jeniskelamin', nohp =  '$nohp', status = '$status' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil update";
            } else {
                $error = "Data gagal update";
            }
        } else { //insert
            $sql1 = "insert into guru(nip,namaguru,jeniskelamin,nohp,status) values ('$nip', '$namaguru', '$jeniskelamin', '$nohp', '$status')";
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
            Create / Edit Data Guru
        </div>
        <div class="card-body">
            <?php
            if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                header("refresh:5;url=dataguru.php");
            }
            ?>
            <?php
            if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                header("refresh:5;url=dataguru.php");
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $nip ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namaguru" class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaguru" name="namaguru"
                            value="<?php echo $namaguru ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-laki" <?php if ($jeniskelamin == "Laki-laki")
                                echo "selected" ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if ($jeniskelamin == "Perempuan")
                                echo "selected" ?>>Perempuan
                                </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                        <label for="nohp" class="col-sm-2 col-form-label">No. Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nohp" name="nohp"
                                value="<?php echo $nohp ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" id="status">
                            <option value="">- Pilih Status -</option>
                            <option value="Aktif" <?php if ($status == "Aktif")
                                echo "selected" ?>>Aktif</option>
                                <option value="Tidak Aktif" <?php if ($status == "Tidak Aktif")
                                echo "selected" ?>>Tidak Aktif
                                </option>
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
            Data Guru
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">Status</th>
                    </tr>
                <tbody>
                    <?php
                    $sql2 = "select * from guru order by id desc";
                    $q2 = mysqli_query($koneksi, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id = $r2['id'];
                        $nip = $r2['nip'];
                        $namaguru = $r2['namaguru'];
                        $jeniskelamin = $r2['jeniskelamin'];
                        $nohp = $r2['nohp'];
                        $status = $r2['status'];

                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $urut++ ?>
                            </th>
                            <td scope="row">
                                <?php echo $nip ?>
                            </td>
                            <td scope="row">
                                <?php echo $namaguru ?>
                            </td>
                            <td scope="row">
                                <?php echo $jeniskelamin ?>
                            </td>
                            <td scope="row">
                                <?php echo $nohp ?>
                            </td>
                            <td scope="row">
                                <?php echo $status ?>
                            </td>
                            <td scope="row">
                                <a href="dataguru.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                        class="btn btn-warning">Edit</button>
                                </a>
                                <a href="dataguru.php?op=delete&id=<?php echo $id ?>"
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