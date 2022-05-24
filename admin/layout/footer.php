<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Created &copy; Lutfi Waziirul Fazri</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->


<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="assets/vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="aseets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script> -->


<!-- datatable -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    jQuery(document).ready(function($) {
        $('.hapus').on('click', function() {
            var getLink = $(this).attr('href');
            swal({
                title: 'Apakah anda yakin akan menghapus ini ?                                                                                                                                                                      ',
                text: 'Hapus Data?',
                html: true,
                confirmButtonColor: '#d9534f',
                showCancelButton: true,
            }, function() {
                window.location.href = getLink
            });
            return false;
        });
    });
</script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

<!-- sweet Alert -->
<script src="assets/js/sweetalert.min.js"></script>

</body>

</html>