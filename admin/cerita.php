<?php
// session_start();
// if (!isset($_SESSION["login"])) {
//     header("location:../login");
//     exit;
// }
include "layout/header.php";
include "koneksi/koneksi.php";


if (isset($_POST['tambah'])) {
    $foto = $_FILES['foto']['name'];

    $simpan = mysqli_query($konek, "INSERT INTO cerita (judul,isi_cerita,tanggal, foto) VALUES  
                                                                                            (   
                                                                                                '" . $_POST['judul'] . "',
                                                                                                '" . $_POST['isi_cerita'] . "',
                                                                                                '" . $_POST['tanggal'] . "',
                                                                                                '$foto'
                                                                                                )");
    move_uploaded_file($_FILES['foto']['tmp_name'], "fileUpload/cerita/" . $_FILES['foto']['name']);

    if ($simpan) {
        echo "<script type='text/javascript'>
        setTimeout(function () { 
          swal({
                  title: 'Data berhasil tersimpan.',
                  type: 'success',
                  timer: 3200,
                  showConfirmButton: false
              });   
        },10);  
        window.setTimeout(function(){ 
          window.location.replace('cerita');
        } ,2000); 
        </script>";
    } else {
        echo "<script type='text/javascript'>
        setTimeout(function () { 
          swal({
                  title: 'Data Gagal tersimpan.',
                  type: 'error',
                  timer: 3200,
                  showConfirmButton: true
              });   
        },10);  
        window.setTimeout(function(){ 
          window.location.replace('cerita');
        } ,3000); 
        </script>";
    }
}
if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi_cerita'];
    $tanggal = $_POST['tanggal'];
    $namaGambar = $_FILES['foto']['name'];
    if ($namaGambar != "") {
        $format = array('png', 'jpg');
        $x = explode('.', $namaGambar);
        $ekstensi = strtolower(end($x));
        $path = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 999);
        $namabaru = $angka_acak . '-' . $namaGambar;
        if (in_array($ekstensi, $format) === true) {
            move_uploaded_file($path, 'fileUpload/cerita/' . $namabaru);
            $query = "UPDATE cerita SET judul='$judul', isi_cerita='$isi', tanggal='$tanggal', foto='$namabaru' WHERE id = '$id'";
            $result = mysqli_query($konek, $query);
            if (!$result) {
                die("Query gagal dijalankan: " . mysqli_errno($konek) .
                    " - " . mysqli_error($konek));
            } else {
                echo "<script type='text/javascript'>
                setTimeout(function () { 
                  swal({
                          title: 'Data berhasil diubah.',
                          type: 'success',
                          timer: 3200,
                          showConfirmButton: false
                          
                      });   
                },10);  
                window.setTimeout(function(){ 
                  window.location.replace('cerita');
                } ,2000); 
                </script>";
            }
        } else {
            echo "<script type='text/javascript'>
            setTimeout(function () { 
              swal({
                      title: 'Ekstensi gambar yang boleh hanya jpg dan png.',
                      type: 'error',
                      timer: 3200,
                      showConfirmButton: true
                  });   
            },10);  
            window.setTimeout(function(){ 
              window.location.replace('cerita');
            } ,3000); 
            </script>";
        }
    } else {
        $query = "UPDATE cerita SET judul='$judul', isi_cerita='$isi', tanggal='$tanggal' WHERE id = '$id'";
        $result = mysqli_query($konek, $query);
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($konek) .
                " - " . mysqli_error($konek));
        } else {
            echo "<script type='text/javascript'>
                setTimeout(function () { 
                  swal({
                          title: 'Data berhasil diubah.',
                          type: 'success',
                          timer: 3200,
                          showConfirmButton: false
                      });   
                },10);  
                window.setTimeout(function(){ 
                  window.location.replace('cerita');
                } ,2000); 
                </script>";
        }
    }
}

if (@$_GET['hal'] == "hapus") {
    $hapus = mysqli_query($konek, "DELETE FROM cerita WHERE id= '$_GET[id]'");
    if ($hapus) {
        echo "<script type='text/javascript'>
        setTimeout(function () { 
          swal({
                  title: 'Data berhasil dihapus.',
                  type: 'success',
                  timer: 3200,
                  showConfirmButton: false
              });   
        },10);  
        window.setTimeout(function(){ 
          window.location.replace('cerita');
        } ,2000); 
        </script>";
    } else {
        echo "<script>alert ('gagal'); document.location=''</script>";
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

                    <div class="d-sm-flex align-items-center justify-content-between mb-5">
                        <h1 class="h3 mb-0 text-gray-800">Cerita Kita</h1>
                        <a href="../index" class="btn btn-primary btn-sm " style="float:right;" target="_blank  ">VIEW WEB</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Cerita Kita <button type="button" class="btn btn-primary btn-icon-text btn-rounded center-block" data-toggle="modal" data-target="#staticBackdrop" style="float: right;">
                                            <i class="ti-plus btn-icon-prepend"></i> Tambah Data
                                        </button></h6>

                                </div>
                                <div class="card-body">

                                    <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No </th>
                                                <th>Judul</th>
                                                <th>Isi Cerita</th>
                                                <th>Tanggal Cerita</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $no = 1;
                                            $query = mysqli_query($konek, "SELECT * FROM cerita");
                                            while ($r = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $r['judul']; ?></td>
                                                    <td><?= $r['isi_cerita']; ?></td>
                                                    <td><?= $r['tanggal']; ?></td>
                                                    <td><img src="fileUpload/cerita/<?= $r['foto']; ?>" width="100px"></td>
                                                    <td> <a href="cerita?hal=hapus&id=<?= $r['id']; ?>" class="btn btn-danger btn-sm hapus"> <i class="fas fa-trash"></i> </a>
                                                        <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>"> <i class="fas fa-edit"></i> </a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="myModal<?php echo $r['id']; ?>" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Cerita</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST" enctype="multipart/form-data">
                                                                    <?php
                                                                    $id = $r['id'];
                                                                    $qedit = mysqli_query($konek, "SELECT * FROM cerita WHERE id='$id'");
                                                                    while ($d = mysqli_fetch_array($qedit)) {
                                                                    ?>

                                                                        <input type="text" name="id" value="<?php echo $d['id']; ?>" hidden>

                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label"> Judul</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="judul" id="judul" value="<?= $d['judul']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label"> Isi Cerita</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea name="isi_cerita" cols="50" rows="10" class="form-control"> <?= $d['isi_cerita']; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label"> Tanggal Cerita</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="date" name="tanggal" id="tanggal" value="<?= $d['tanggal']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label">Foto/Gambar</label>
                                                                            <div class="col-sm-9">
                                                                                <img src="fileupload/cerita/<?= $r['foto']; ?>" width="100px">
                                                                                <input type="file" name="foto" id="foto" class="form-control">
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
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah data Cerita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 col-form-label"> Judul Cerita</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh :Pertama Bertemu">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 col-form-label"> Isi Cerita</label>
                                        <div class="col-sm-9">
                                            <textarea name="isi_cerita" cols="50" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 col-form-label"> Tanggal Cerita</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="foto" id="foto" class="form-control">
                                            <!-- <small> Rekomendasi (2100px) X (1200px)</small> -->
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