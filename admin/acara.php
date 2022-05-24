<?php


include('koneksi/koneksi.php');
include('layout/header.php');

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $jam_sampai = $_POST['jam_sampai'];
    $tempat = $_POST['tempat'];
    $alamat = $_POST['alamat'];
    $tanggal_res = $_POST['tanggal_res'];
    $jam_res = $_POST['jam_res'];
    $jam_res_sampai = $_POST['jam_res_sampai'];
    $tempat_res = $_POST['tempat_res'];
    $alamat_res = $_POST['alamat_res'];

    mysqli_query($konek, "UPDATE acara SET tanggal='$tanggal', jam='$jam', jam_sampai='$jam_sampai', tempat='$tempat', alamat='$alamat', 
                                           tanggal_res='$tanggal_res', jam_res='$jam_res',jam_res_sampai='$jam_res_sampai', 
                                           tempat_res='$tempat_res', alamat_res='$alamat_res'
                                           WHERE id ='$id'");

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
      window.location.replace('acara');
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
                        <h1 class="h3 mb-0 text-gray-800">Acara</h1>
                        <a href="../index" class="btn btn-primary btn-sm " style="float:right;" target="_blank  ">VIEW WEB</a>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-lg-6 align-content-center">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data Akad</h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $ambil = mysqli_query($konek, "SELECT * FROM acara");
                                        while ($r = mysqli_fetch_array($ambil)) {
                                        ?>
                                            <input type="text" name="id" value="<?php echo $r['id'] ?>" hidden>


                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">Tanggal Akad</label>
                                                <div class="col-sm-12">
                                                    <input type="date" name="tanggal" id="tanggal" value="<?= $r['tanggal']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Jam Akad</label>
                                                <div class="col-sm-4">
                                                    <input type="time" name="jam" id="jam" value="<?= $r['jam']; ?>" class="form-control">
                                                </div>-
                                                <div class="col-sm-4">
                                                    <input type="time" name="jam_sampai" id="jam" value="<?= $r['jam_sampai']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">Tempat Akad</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="tempat" id="tempat" value="<?= $r['tempat']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label">Alamat Akad</label>
                                                <div class="col-sm-12">
                                                    <textarea name="alamat" class="form-control" rows="10"><?= $r['alamat']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>

                                            </div>
                                            <small>*tombol simpan berlaku untuk menu akad dan juga resepsi</small>

                                </div>
                            </div>
                        </div>

                        <!-- resepsi -->
                        <div class="col-lg-6 align-content-center">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data Resepsi</h6>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Tanggal Resepsi</label>
                                        <div class="col-sm-12">
                                            <input type="date" name="tanggal_res" id="tanggal" value="<?= $r['tanggal_res']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Jam Resepsi</label>
                                        <div class="col-sm-4">
                                            <input type="time" name="jam_res" id="jam" value="<?= $r['jam_res'] ?>" class="form-control">
                                        </div> -
                                        <div class="col-sm-4">
                                            <input type="time" name="jam_res_sampai" id="jam" value="<?= $r['jam_res_sampai'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Tempat Resepsi</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="tempat_res" id="tempat" value="<?= $r['tempat_res']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Alamat Resepsi</label>
                                        <div class="col-sm-12">
                                            <textarea name="alamat_res" class="form-control" rows="10"><?= $r['alamat_res']; ?></textarea>
                                        </div>
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