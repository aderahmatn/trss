
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TRSS | <?php echo ucfirst($this->uri->segment(1)) ?> </title>
  <link rel="icon" href="<?=base_url()?>/favicon.png" type="image/png">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/font.css') ?>" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/toastr/toastr.min.css') ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
  




</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard'); ?>">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-industry"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TRSS <sup>v.1.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $this->uri->segment(1) == 'dashboard' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Main Menu
        </div>

        <?php if ($this->session->userdata('role') == 2) { ?>   
          
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item <?php echo $this->uri->segment(1) == 'schedule' ? 'active': '' ?>">
            <a class="nav-link" href="<?=base_url('schedule'); ?>">
              <i class="far fa fa-cubes"></i>
              <span>Production</span>
            </a>
          </li>
        <?php } ?>

        
        <!-- Menu halaman admin produksi -->
        <?php if ($this->session->userdata('role') == 1) { ?> 
          <li class="nav-item 
          <?php echo $this->uri->segment(1) == 'planning' ? 'active': '' ?>
          <?php echo $this->uri->segment(1) == 'product' ? 'active': '' ?>
          <?php echo $this->uri->segment(1) == 'users' ? 'active': '' ?>
          ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterdata" aria-expanded="true" aria-controls="masterdata">
            <i class="fas fa-server"></i>
            <span>Master Data</span>
          </a>
          <div id="masterdata" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item <?php echo $this->uri->segment(1) == 'planning' ? 'active': '' ?>" href="<?php echo site_url('planning') ?>"><i class="fas fa-crosshairs"></i>  Data Planning</a>
              <a class="collapse-item <?php echo $this->uri->segment(1) == 'product' ? 'active': '' ?>" href="<?php echo site_url('product') ?>"><i class="fas fa-fw fa-cubes"></i> Data Produk</a>
              <a class="collapse-item <?php echo $this->uri->segment(1) == 'users' ? 'active': '' ?>" href="<?php echo site_url('users') ?>"><i class="fas fa-fw fa-users"></i>  Data User</a>
            </div>
          </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php echo $this->uri->segment(1) == 'report' ? 'active': '' ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report" aria-expanded="true" aria-controls="report">
            <i class="fas fa-file"></i>
            <span>Report</span>
          </a>
          <div id="report" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item <?php echo $this->uri->segment(2) == 'periodik' ? 'active': '' ?>" href="<?php echo site_url('report/periodik') ?>"><i class="fas fa-calendar"></i>  Report Periodik</a>

              <a class="collapse-item <?php echo $this->uri->segment(2) == 'stok' ? 'active': '' ?>" href="<?php echo site_url('report/stok') ?>"><i class="fas fa-fw fa-cubes"></i> Report Stok</a>
              
            </div>
          </div>
        </li>
      <?php } ?>

      <?php if ($this->session->userdata('role') == 3) { ?>   

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php echo $this->uri->segment(1) == 'schedule' ? 'active': '' ?>">
          <a class="nav-link" href="<?=base_url('schedule'); ?>">
            <i class="far fa-calendar-alt"></i>
            <span>Jadwal Produksi</span>
          </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php echo $this->uri->segment(1) == 'report' ? 'active': '' ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report" aria-expanded="true" aria-controls="report">
            <i class="fas fa-file"></i>
            <span>Report</span>
          </a>
          <div id="report" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item <?php echo $this->uri->segment(2) == 'periodik' ? 'active': '' ?>" href="<?php echo site_url('report/periodik') ?>"><i class="fas fa-calendar"></i>  Report Periodik</a>

              <a class="collapse-item <?php echo $this->uri->segment(2) == 'stok' ? 'active': '' ?>" href="<?php echo site_url('report/stok') ?>"><i class="fas fa-fw fa-cubes"></i> Report Stok</a>
              
            </div>
          </div>
        </li>
      <?php } ?>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello <?= ucfirst($this->session->userdata('uname'));?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?=$contents?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; TRSS BY ADRN 2019</span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin ingin logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=site_url('auth/logout')?>">Logout <i class="fas fa-sign-out-alt fa-sm"></i></a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js') ?>"></script>

  <script src="<?php echo base_url('assets/toastr/toastr.min.js') ?>"></script>

  <script type="text/javascript">
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

  </script>
  <!--Delete Confirmation-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
          <a id="btn-delete" class="btn btn-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
        </div>
      </div>
    </div>
  </div>




  <script type="text/javascript">
    <?php if($this->session->flashdata('success')){ ?>
      toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php }else if($this->session->flashdata('error')){  ?>
      toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php }else if($this->session->flashdata('warning')){  ?>
      toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php }else if($this->session->flashdata('info')){  ?>
      toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php } ?>

    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }

    $(document).ready(function() {
      $('#dataTable2').DataTable();
      $('#tblprocess').DataTable();
    } );
  </script>
</body>

</html>
