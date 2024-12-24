<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css">
  <link href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

  <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

  <link href="<?php echo base_url(); ?>assets/datepicker/datapicker/datepicker3.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" rel="stylesheet">

  <!-- mdi icon -->
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">

  <!-- data tables -->
  <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
      rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
      rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
      rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css"
      rel="stylesheet" type="text/css" />
    
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>
    <div id="loader" class="loading-spinn" style="display: none;">Loading&#8230;</div>
    <!-- Begin page -->
    <div id="wrapper">

      <!-- Topbar -->
      <?php $this->load->view('layout/top_bar'); ?>
      <!-- End -->

      <!-- Leftbar -->
      <?php $this->load->view('layout/left_sidebar'); ?>

        <!-- ============================================================== -->
          <!-- Start Page Content here -->
          <!-- ============================================================== -->
            <div class="content-page" id="content-section">
              <?php $this->load->view($template); ?>

              <!-- footer start -->
              <footer class="footer">
                <strong>Copyright &copy; 2024 <a href="<?php echo base_url(); ?>">Susmitha</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                  <b>Version</b> 3.1.0
                </div>
              </footer>
            </div>
      
       <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
       <!-- END wrapper -->
    </div>
  

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert-dev.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/js/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/select2/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>

<!-- mdi icons link -->
<script src="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/scripts/verify.min.js"></script>


<!-- Data tables -->
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/datepicker/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/datatables.init.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>


<script>
    var baseurl = '<?php echo base_url(); ?>';

    function log_out() {
        swal({
                title: "",
                text: "Are you sure to log out from the application?",
                type: "warning",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false
            },
            function(isconfirm) {
                if (isconfirm) {
                    window.location.href = baseurl + "logout";
                }
            }
        );
    }

</script>

</body>
</html>