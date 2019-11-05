<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versión</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 CardOffice.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>

</html>
<script>
    const url = '<?= base_url ?>';
</script>
<!-- jQuery -->
<script src="<?= base_url ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url ?>assets/plugins/validetta/validetta.js"></script>
<script src="<?= base_url ?>assets/plugins/validetta/localization/validettaLang-es-ES.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url ?>assets/dist/js/demo.js"></script>
<script src="<?= base_url ?>assets/dist/js/main.js"></script>
<?php
foreach ($scripts as $script) {
    ?>
    <script src="<?= $script ?>"></script>
<?php }
?>