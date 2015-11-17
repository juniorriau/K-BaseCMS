<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KB CMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo Request::base_url();?>/assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo Request::base_url();?>/assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo Request::base_url();?>/assets/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo Request::base_url();?>/assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo Request::base_url();?>/assets/dist/css/skins/_all-skins.min.css">
    <!-- Data tables -->
    <link rel="stylesheet" href="<?php echo Request::base_url();?>/assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php
      include 'navbar.php';
      include 'body.php';
      ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo Request::base_url();?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo Request::base_url();?>/assets/plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo Request::base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo Request::base_url();?>/assets/dist/js/app.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo Request::base_url();?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo Request::base_url();?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- CKEditor -->
    <?php
    if($uri[0]=="articles"){
        if($uri[1]=="add" || $uri[1]=="update"){?>
    <script src="<?php echo Request::base_url();?>/assets/plugins/ckeditor/ckeditor.js"></script>
    <script>
      $(function () {
        CKEDITOR.replace('editor');
      });
    </script>
    <?php }} ?>
    <script>
      $(function () {
        $('#data').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
  </body>
</html>
