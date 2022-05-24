<?php

include "layout/header.php";
include "koneksi/koneksi.php";


if (isset($_POST['tambah'])) {

    $nama = $_POST["nama"];
    $wa = $_POST["no_wa"];
    $potong = substr($wa, 1);
    $split = str_split($wa);
    $no_wa = $split[0];
    if ($no_wa == 0) {
        $no = "+62" . $potong;
    } elseif ($no_wa != 0) {
        $no = "+" . $wa;
    } elseif ($no_wa == "+") {
        $no = $wa;
    }
    $simpan = mysqli_query($konek, "INSERT INTO tamu VALUES ('','$nama','$no')");

    if ($simpan) {
        echo "<script>alert ('berhasil'); document.location='tamu'</script>";
    } else {
        echo "<script>alert ('gagal'); document.location='tamu'</script>";
    }
}
if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $nama = $_POST["nama"];
    $wa = $_POST["no_wa"];
    $potong = substr($wa, 1);
    $split = str_split($wa);
    $no_wa = $split[0];
    if ($no_wa == 0) {
        $no = "+62" . $potong;
    } elseif ($no_wa != 0) {
        $no = "+" . $wa;
    } elseif ($no_wa == "+") {
        $no = $wa;
    }

    $query = "UPDATE tamu SET nama='$nama', no_wa='$no' WHERE id = '$id'";
    $result = mysqli_query($konek, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($konek) .
            " - " . mysqli_error($konek));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='tamu';</script>";
    }
}


if (@$_GET['hal'] == "hapus") {
    $hapus = mysqli_query($konek, "DELETE FROM tamu WHERE id= '$_GET[id]'");
    if ($hapus) {
        echo "<script>alert ('berhasil'); document.location='tamu'</script>";
    } else {
        echo "<script>alert ('gagal'); document.location='tamu'</script>";
    }
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include "layout/sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include "layout/nav.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">TAMU UNDANGAN</h1>
                        <a href="../index" class="btn btn-primary " style="float:right;" target="_blank  ">VIEW WEB</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Tamu <button type="button" class="btn btn-primary btn-icon-text btn-rounded center-block" data-toggle="modal" data-target="#staticBackdrop" style="float: right;">
                                            <i class="ti-plus btn-icon-prepend"></i> Tambah Data
                                        </button></h6>

                                </div>
                                <div class="card-body">

                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No </th>
                                                <th>Nama</th>
                                                <th>No WA</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $no = 1;
                                            $query = mysqli_query($konek, "SELECT * FROM tamu");
                                            while ($r = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $r['nama']; ?></td>
                                                    <td><?= $r['no_wa']; ?></td>
                                                    <td> <a href="tamu?hal=hapus&id=<?= $r['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')"> <i class="fas fa-trash"></i> </a>
                                                        <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>"> <i class="fas fa-edit"></i> </a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="myModal<?php echo $r['id']; ?>" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Tamu</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST" enctype="multipart/form-data">
                                                                    <?php
                                                                    $id = $r['id'];
                                                                    $qedit = mysqli_query($konek, "SELECT * FROM tamu WHERE id='$id'");
                                                                    while ($d = mysqli_fetch_array($qedit)) {
                                                                    ?>

                                                                        <input type="text" name="id" value="<?php echo $d['id']; ?>" hidden>

                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label">Nama </label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="nama" id="nama" value="<?= $d['nama']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label">No WA</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="no_wa" id="no_wa" value="<?= $d['no_wa']; ?>" class="form-control">
                                                                                <span>*jika akan mengedit nomor, harap edit secara keseluruhan dengan berawalan angka 0 </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary btn-sm" name="edit">Simpan</button>
                                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>

                            <!-- Color System -->


                        </div>

                    </div>

                    <!-- Content Row -->



                    <!-- Content Row -->


                </div>
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah data sosmed</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="POST" action="" enctype="multipart/form-data">


                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-3 col-form-label">Nama </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Tamu Undangan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-3 col-form-label">No WA</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_wa" id="no_wa" class="form-control" placeholder="Nomor Hp 10-13 Digit, Contoh : 081809412771" pattern="^\d{10,12}$">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="tambah">Simpan</button>
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- Button trigger modal -->


            <?php



            include "layout/footer.php";
            ?>