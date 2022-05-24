<?php


include('koneksi/koneksi.php');
include('layout/header.php');

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $samb = $_POST['sambutan'];
    $nama_wanita = $_POST['nama_wanita'];
    $ket_wanita = $_POST['ket_wanita'];
    $nama_pria = $_POST['nama_pria'];
    $ket_pria = $_POST['ket_pria'];
    $foto_wanita = $_FILES['foto_wanita']['name'];
    $tmp_wanita = $_FILES['foto_wanita']['tmp_name'];


    $foto_pria = $_FILES['foto_pria']['name'];
    $tmp_pria = $_FILES['foto_pria']['tmp_name'];

    if (empty($foto_pria) && !empty($foto_wanita)) {
        $path = "fileUpload/wanita/" . $foto_wanita;
        $pria_asal = $_POST["pria_asal"];
        move_uploaded_file($tmp_wanita, $path);
        mysqli_query($konek, "UPDATE pasangan SET sambutan='$samb', foto_wanita='$foto_wanita', nama_wanita='$nama_wanita', ket_wanita='$ket_wanita',
        foto_pria='$pria_asal', nama_pria='$nama_pria', ket_pria='$ket_pria' WHERE id ='$id'");
    } elseif (!empty($foto_pria) && empty($foto_wanita)) {
        $pathG = "fileUpload/pria/" . $foto_pria;
        $wanita_asal = $_POST["wanita_asal"];
        move_uploaded_file($tmp_pria, $pathG);
        mysqli_query($konek, "UPDATE pasangan SET sambutan='$samb', foto_wanita='$wanita_asal', nama_wanita='$nama_wanita', ket_wanita='$ket_wanita', 
        foto_pria='$foto_pria', nama_pria='$nama_pria', ket_pria='$ket_pria' WHERE id ='$id'");
    } else if (!empty($foto_pria) && !empty($foto_wanita)) {
        $path = "fileUpload/wanita/" . $foto_wanita;
        $pathG = "fileUpload/pria/" . $foto_pria;
        if (move_uploaded_file($tmp_wanita, $path)) {

            move_uploaded_file($tmp_pria, $pathG);
            mysqli_query($konek, "UPDATE pasangan SET sambutan='$samb', foto_wanita='$foto_wanita', nama_wanita='$nama_wanita', ket_wanita='$ket_wanita', 
            foto_pria='$foto_pria',nama_pria='$nama_pria', ket_pria='$ket_pria' WHERE id ='$id'");
        }
    } else {
        $wanita_asal = $_POST["wanita_asal"];
        $pria_asal = $_POST["pria_asal"];
        mysqli_query($konek, "UPDATE pasangan SET sambutan='$samb', foto_wanita='$wanita_asal', nama_wanita='$nama_wanita', ket_wanita='$ket_wanita', 
        foto_pria='$pria_asal',nama_pria='$nama_pria', ket_pria='$ket_pria' WHERE id ='$id'");
    }
    // echo "<script>alert('Data Berhasil di Ubah');  window.location ='pasangan'</script>";
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
      window.location.replace('pasangan');
    } ,2000); 
    </script>";
}
?>




<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "layout/sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "layout/nav.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-5">
                        <h1 class="h3 mb-0 text-gray-800">Pasangan</h1>
                        <a href="../index" class="btn btn-primary btn-sm " style="float:right;" target="_blank  ">VIEW WEB</a>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-lg-12 align-content-center">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data Pasangan</h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $ambil = mysqli_query($konek, "SELECT * FROM pasangan");
                                        while ($r = mysqli_fetch_array($ambil)) {
                                        ?>
                                            <input type="text" name="id" value="<?php echo $r['id'] ?>" hidden>
                                            <input type="hidden" name="wanita_asal" value="<?= $r['foto_wanita']; ?>">
                                            <input type="hidden" name="pria_asal" value="<?= $r['foto_pria']; ?>">

                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Kata Sambutan</label>
                                                <div class="col-sm-9">
                                                    <textarea name="sambutan" class="form-control" rows="10"> <?= $r['sambutan']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Foto Pengantin Wanita</label>
                                                <div class="col-sm-9">
                                                    <img src="fileUpload/wanita/<?= $r['foto_wanita']; ?>" alt="" width="100px">
                                                    <input type="file" name="foto_wanita" id="foto_wanita" class="form-control">


                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Nama Pengantin Wanita</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_wanita" id="nama_wanita" value="<?= $r['nama_wanita']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Deskripsi Tentang Wanita</label>
                                                <div class="col-sm-9">
                                                    <textarea name="ket_wanita" class="form-control" rows="10"><?= $r['ket_wanita']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Foto Pengantin Pria</label>
                                                <div class="col-sm-9">
                                                    <img src="fileUpload/pria/<?= $r['foto_pria']; ?>" alt="" width="100px">
                                                    <input type="file" name="foto_pria" id="foto_pria" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Nama Pengantin Pria</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_pria" id="nama_pria" value="<?= $r['nama_pria']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Deskripsi Tentang Pria</label>
                                                <div class="col-sm-9">
                                                    <textarea name="ket_pria" class="form-control" rows="10"><?= $r['ket_pria']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                                            </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "layout/footer.php"; ?>

</body>

</html>