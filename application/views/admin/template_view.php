<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Cahaya Travel</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer>
  <!-- Custom styles for this page -->
  <link href="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
  <!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="icon"
      type="image/png"
      href="<?php echo base_url();?>assets/logo/cahayatravel-new.png"/>
  <link rel="stylesheet"
      href="<?php echo base_url();?>assets/css/custom-css.css"/>
  <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>admin/add_user">
        <div class="sidebar-brand-text mx-3">Admin Cahaya Travel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php 
        $role = $this->session->userdata('role');
        if($role == "manager") {
      ?>
        <li class="nav-item <?php if($this->uri->segment(2)=="index"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Manager</span></a>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="laporan"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/laporan">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Laporan</span></a>
        </li>
      <?php } ?>
      <?php 
        $role = $this->session->userdata('role');
        if($role == "admin") {
      ?>
        <li class="nav-item <?php if($this->uri->segment(2)=="index"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        <li class="nav-item dropdown <?php if($page =="data_master"){echo "active";}?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
          </a>
          <div id="collapseTwo" class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="dropdown-header">Master Data:</h6>
              <a class="dropdown-item" href="<?php echo base_url();?>admin/data_hotel">Data Hotel</a>
              <a class="dropdown-item" href="<?php echo base_url();?>admin/data_bus">Data Bus</a>
              <a class="dropdown-item" href="<?php echo base_url();?>admin/data_daftar_paket">Data Daftar Paket</a>
              <a class="dropdown-item" href="<?php echo base_url();?>admin/data_objek_wisata">Data Objek Wisata</a>
              <a class="dropdown-item" href="<?php echo base_url();?>admin/kantor_cabang">Data Kantor Cabang</a>
              <a class="dropdown-item" href="<?php echo base_url();?>admin/titik_penjemputan">Data Titik Penjemputan</a>
            </div>
          </div>
        </li>
      <?php }?>
      <li class="nav-item <?php if($page == "data_pengguna"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/data_pengguna">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Data Pengguna</span></a>
      </li>
      <?php 
        $role = $this->session->userdata('role');
        if($role == "admin") {
      ?>
        <li class="nav-item <?php if($page == "data_info_wisata"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/data_info_wisata">
            <i class="fas fa-fw fa-street-view"></i>
            <span>Data Informasi Wisata</span></a>
        </li>
        <li class="nav-item <?php if($page == "data_paket"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/data_paket_wisata">
            <i class="fas fa-fw fa-server"></i>
            <span>Data Paket Wisata</span></a>
        </li>
        <li class="nav-item <?php if($page == "data_paket_customize"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/data_paket_customize">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Data Paket Customize</span></a>
        </li>
        <li class="nav-item <?php if($page == "data_transaksi"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/data_transaksi">
            <i class="fas fa-fw fa-archive"></i>
            <span>Data Transaksi</span></a>
        </li>
        <li class="nav-item <?php if($page == "data_pemesan"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/data_pemesan">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Data Informasi Pemesan</span></a>
        </li>
        <li class="nav-item <?php if($page == "data_history"){echo "active";}?>">
          <a class="nav-link" href="<?php echo base_url();?>admin/data_history">
            <i class="fas fa-fw fa-history"></i>
            <span>Data History Transaksi</span></a>
        </li>
      <?php }?>
      <!-- Divider -->
      <hr class="sidebar-divider">  

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

            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span><i class="fa fa-user" aria-hidden="true"></i>
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
        <?php
          if (isset($tampilan)) {
            $this->load->view($tampilan);
          } 
        ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Website by &copy; Tony Andhika Mahendra & Winda Eka Fitriani</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url();?>admin/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!--<script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>-->
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/admin/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
  <script>
        $(document).delegate('#btn-edit-transaction','click',function() {
            var id = $(this).attr("data-id");
            $("#id-trx-edit").attr("value",id);
        });
        $(document).delegate('#btn-edit-transaction-request','click',function() {
            var id = $(this).attr("data-id");
            $("#id-trx-edit-request").attr("value",id);
        });

        $(document).delegate('#btn-show-report','click',function(e) {
            e.preventDefault();
            var start_date = $("#tanggal_awal").val();
            var end_date = $("#tanggal_akhir").val();
            alert(start_date);
            if (start_date=='' || $.trim(start_date)==''){
              alert('Tanggal mulai tidak boleh kosong!');
              setTimeout(function(){ $("#myTransactionTable").modal('hide'); }, 500);
            } else if (end_date=='' || $.trim(end_date)==''){
              alert('Tanggal akhir tidak boleh kosong!');
              setTimeout(function(){ $("#myTransactionTable").modal('hide'); }, 500);
            } else {
              $.ajax({
                url: "<?=base_url();?>Admin/transaction_table_modal",
                async: false,
                type: "post",
                data: {start_date:start_date,end_date:end_date,status:status},
                dataType: "html",
                success: function(data){
                  $("#myTransactionTable").find(".modal-body").html(data);
                }
              });
            }
        });

  </script>
</body>
<?php
    function rupiah($angka){
        
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

    function rm_rupiah($angka){
        $angka = substr($angka,0,2);
        var_dump("angka", $angka);
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
    
?>
</html>
