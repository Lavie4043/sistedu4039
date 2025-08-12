<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer --> 
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      v. 1. 0.
    </div>
    <!-- Default to the left -->
     
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--Datatables -->
<script src="<?=APP_URL;?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/jszip/jszip.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- AdminLTE App -->
<script src="<?php echo APP_URL;?>/public/dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function() {
    function inicializarTabla(idTabla) {
      if ($.fn.DataTable.isDataTable(idTabla)) {
        $(idTabla).DataTable().clear().destroy();
      }
      $(idTabla).DataTable({
        responsive: true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
      });
    }

    inicializarTabla('#example1');
    inicializarTabla('#examplePrestamos');
  });
</script>
<script src="<?= APP_URL ?>/public/js/datatables-init.js"></script>
</body>
</html>