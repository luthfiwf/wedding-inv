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

    $simpan = mysqli_query($konek, "INSERT INTO gallery (ket_foto, foto) VALUES  ('" . $_POST['ket_foto'] . "','$foto')");
    move_uploaded_file($_FILES['foto']['tmp_name'], "fileUpload/gallery/" . $_FILES['foto']['name']);

    if ($simpan) {
        // echo "<script type='text/javascript'>
        // setTimeout(function () { 
        //   swal({
        //           title: 'Data berhasil tersimpan.',
        //           type: 'success',
        //           timer: 3200,
        //           showConfirmButton: false
        //       });   
        // },10);  
        // window.setTimeout(function(){ 
        //   window.location.replace('gallery');
        // } ,2000); 
        // </script>";
    } else {
        // echo "<script type='text/javascript'>
        // setTimeout(function () { 
        //   swal({
        //           title: 'Data berhasil tersimpan.',
        //           type: 'error',
        //           timer: 3200,
        //           showConfirmButton: true
        //       });   
        // },10);  
        // window.setTimeout(function(){ 
        //   window.location.replace('gallery');
        // } ,3000); 
        // </script>";
    }
}
if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $ket = $_POST['ket_foto'];
    $namaGambar = $_FILES['foto']['name'];
    if ($namaGambar != "") {
        $format = array('png', 'jpg');
        $x = explode('.', $namaGambar);
        $ekstensi = strtolower(end($x));
        $path = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 999);
        $namabaru = $angka_acak . '-' . $namaGambar;
        if (in_array($ekstensi, $format) === true) {
            move_uploaded_file($path, 'fileUpload/gallery/' . $namabaru);
            $query = "UPDATE gallery SET ket_foto='$ket', foto='$namabaru' WHERE id = '$id'";
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
                  window.location.replace('gallery');
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
              window.location.replace('gallery');
            } ,3000); 
            </script>";
        }
    } else {
        $query = "UPDATE gallery SET ket_foto='$ket' WHERE id = '$id'";
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
                  window.location.replace('gallery');
                } ,2000); 
                </script>";
        }
    }
}

if (@$_GET['hal'] == "hapus") {
    $hapus = mysqli_query($konek, "DELETE FROM gallery WHERE id= '$_GET[id]'");
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
          window.location.replace('gallery');
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
                        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
                        <a href="../index" class="btn btn-primary btn-sm " style="float:right;" target="_blank  ">VIEW WEB</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Gallery <button type="button" class="btn btn-primary btn-icon-text btn-rounded center-block" data-toggle="modal" data-target="#staticBackdrop" style="float: right;">
                                            <i class="ti-plus btn-icon-prepend"></i> Tambah Data
                                        </button></h6>

                                </div>
                                <div class="card-body">

                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No </th>
                                                <th>Judul</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $no = 1;
                                            $query = mysqli_query($konek, "SELECT * FROM gallery");
                                            while ($r = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $r['ket_foto']; ?></td>
                                                    <td><img src="fileUpload/gallery/<?= $r['foto']; ?>" width="100px"></td>
                                                    <td> <a href="gallery?hal=hapus&id=<?= $r['id']; ?>" class="btn btn-danger btn-sm hapus"> <i class="fas fa-trash"></i> </a>
                                                        <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>"> <i class="fas fa-edit"></i> </a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="myModal<?php echo $r['id']; ?>" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Gallery</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST" enctype="multipart/form-data">
                                                                    <?php
                                                                    $id = $r['id'];
                                                                    $qedit = mysqli_query($konek, "SELECT * FROM gallery WHERE id='$id'");
                                                                    while ($d = mysqli_fetch_array($qedit)) {
                                                                    ?>

                                                                        <input type="text" name="id" value="<?php echo $d['id']; ?>" hidden>

                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label"> Keterangan Foto</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="ket_foto" id="ket_foto" value="<?= $d['ket_foto']; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="tempat" class="col-sm-3 col-form-label">Foto</label>
                                                                            <div class="col-sm-9">
                                                                                <img src="fileupload/gallery/<?= $r['foto']; ?>" width="100px">
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
                            <small> Note : <br> 1. Maksimal Upload 6 Foto <br>
                                2. Disarankan compress ukuran foto sebelum di upload <br>
                                3. Rekomendasi situs compress foto online <a href="https://tinyjpg.com/" target="_blank">tinyjpg.com</a>
                            </small>

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
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah data Gallery</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 col-form-label"> Keterangan Foto</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ket_foto" id="ket_foto" class="form-control" placeholder="*Contoh : Prewedding">
                                            <small>*keterangan dapat di kosongkan</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 col-form-label">Upload Foto</label>
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