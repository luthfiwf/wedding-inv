<?php

include "layout/header.php";
include "koneksi/koneksi.php";

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
                        <h1 class="h3 mb-0 text-gray-800">KELOLA PESAN</h1>
                        <a href="../index" class="btn btn-primary " style="float:right;" target="_blank  ">VIEW WEB</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Yuk Kirim Pesan</h6>
                                    <p>Menu ini berfungsi untuk mengirim pesan WA agar bisa di broadcast ke semua tamu undangan yang telah terdaftar</p>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM data_wa WHERE (status <> 'SENT' and status<>'QUEUE') OR status is null ORDER BY id desc";
                                    $result1 = mysqli_query($konek, $sql);
                                    ?>
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO </th>
                                                <th>NO WA</th>
                                                <th>STATUS</th>
                                                <th>ISI PESAN WA</th>
                                                <th>VAR_1</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($r = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?> </td>
                                                    <td><?= $r['no_wa']; ?> </td>
                                                    <td><?= $r['status']; ?> </td>
                                                    <td><?= $r['isi_wa']; ?> </td>
                                                    <td><?= $r['var_1']; ?></td>
                                                    <td><a href="tamu?hal=hapus&id=<?= $r['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')"> <i class="fas fa-trash"></i> </a></td>
                                                <?php } ?>
                                                </tr>

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


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- Button trigger modal -->


            <?php



            include "layout/footer.php";
            ?>