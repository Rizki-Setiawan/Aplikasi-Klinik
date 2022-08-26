<?php 
include("auth.php");
include("db.php");
$id_user=$_SESSION['id_user'];
$sql="SELECT * FROM login where id_user='$id_user'";
$result=mysqli_query($con,$sql);
$data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Klinik TongFang</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

  <!-- DataTables -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/plugins/datatables/buttons.dataTables.min.css" >

</head>

<body id="page-top">

   <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar-brand-->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=dashboard" >
          <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-briefcase-medical"></i>
          </div>
          <div class="sidebar-brand-text mx-2"> Klinik TongFang </div>
        </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>


      <li class="nav-item">
        <a class="nav-link" href="index.php?page=pembayaran">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Pembayaran</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=pemeriksaan">
          <i class="fas fa-fw fa-stethoscope"></i>
          <span>Pemeriksaan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerawatan" aria-expanded="true" aria-controls="collapsePerawatan">
          <i class="fas fa-fw fa-procedures"></i>
          <span>Perawatan</span>
        </a>
        <div id="collapsePerawatan" class="collapse" aria-labelledby="headingPerawatan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=rawat_inap">Rawat inap</a>
            <a class="collapse-item" href="index.php?page=rawat_jalan">Rawat jalan</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-injured"></i>
          <span>Pasien</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_pasien">Tambah Pasien</a>
            <a class="collapse-item" href="index.php?page=pasien">Data Pasien</a>
            <a class="collapse-item" href="index.php?page=kunjungan">Kunjungan Pasien</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDokter" aria-expanded="true" aria-controls="collapseDokter">
          <i class="fas fa-fw fa-user-md"></i>
          <span>Dokter</span>
        </a>
        <div id="collapseDokter" class="collapse" aria-labelledby="headingDokter" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_dokter">Tambah Dokter</a>
            <a class="collapse-item" href="index.php?page=dokter">Data Dokter</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePetugas" aria-expanded="true" aria-controls="collapsePetugas">
          <i class="fas fa-fw fa-user-nurse"></i>
          <span>Petugas</span>
        </a>
        <div id="collapsePetugas" class="collapse" aria-labelledby="headingPetugas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_petugas">Tambah Petugas</a>
            <a class="collapse-item" href="index.php?page=petugas">Data Petugas</a>
          </div>
        </div>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObat" aria-expanded="true" aria-controls="collapseObat">
          <i class="fas fa-fw fa-pills"></i>
          <span>Obat</span>
        </a>
        <div id="collapseObat" class="collapse" aria-labelledby="headingObat" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_obat">Tambah Obat</a>
            <a class="collapse-item" href="index.php?page=obat">Data Obat</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAlkes" aria-expanded="true" aria-controls="collapseAlkes">
          <i class="fas fa-fw fa-syringe"></i>
          <span>Alat Kesehatan</span>
        </a>
        <div id="collapseAlkes" class="collapse" aria-labelledby="headingAlkes" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_alkes">Tambah Alat Kesehatan</a>
            <a class="collapse-item" href="index.php?page=alkes">Data Alat Kesehatan</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTindakan" aria-expanded="true" aria-controls="collapseTindakan">
          <i class="fas fa-fw fa-heartbeat"></i>
          <span>Tindakan</span>
        </a>
        <div id="collapseTindakan" class="collapse" aria-labelledby="headingTindakan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_tindakan">Tambah Tindakan</a>
            <a class="collapse-item" href="index.php?page=tindakan">Data Tindakan</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLab" aria-expanded="true" aria-controls="collapseLab">
          <i class="fas fa-fw fa-flask"></i>
          <span>Lab</span>
        </a>
        <div id="collapseLab" class="collapse" aria-labelledby="headingLab" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_lab">Tambah Lab</a>
            <a class="collapse-item" href="index.php?page=lab">Data Lab</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDiagnosis" aria-expanded="true" aria-controls="collapseDiagnosis">
          <i class="fas fa-fw fa-search-plus"></i>
          <span>Diagnosis</span>
        </a>
        <div id="collapseDiagnosis" class="collapse" aria-labelledby="headingDiagnosis" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_diagnosis">Tambah Diagnosis</a>
            <a class="collapse-item" href="index.php?page=diagnosis">Data Diagnosis</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar" aria-expanded="true" aria-controls="collapseKamar">
          <i class="fas fa-fw fa-person-booth"></i>
          <span>Kamar</span>
        </a>
        <div id="collapseKamar" class="collapse" aria-labelledby="headingKamar" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_kamar">Tambah Kamar</a>
            <a class="collapse-item" href="index.php?page=kamar">Data Kamar</a>
          </div>
        </div>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengguna" aria-expanded="true" aria-controls="collapsePengguna">
          <i class="fas fa-fw fa-user"></i>
          <span>Pengguna</span>
        </a>
        <div id="collapsePengguna" class="collapse" aria-labelledby="headingPengguna" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?page=tam_pengguna">Tambah pengguna</a>
            <a class="collapse-item" href="index.php?page=pengguna">Data pengguna</a>
          </div>
        </div>
      </li>


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
      <div id="content" style="background-color: #ECF0F5;">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pemberitahuan
                </h6>
                  <div>
                       <a class="dropdown-item text-center small text-gray-500" href="#">Tidak ada pemberitahuan.</a>
                  </div>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Pesan
                </h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">Tidak ada pesan.</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $data['username']; ?></b></span>
                <img class="img-profile rounded-circle" src="assets/img/avatar5.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
           <div class="content-wrapper animated fadeIn">
            <?php include 'db.php' ?>
            <?php include 'content.php' ?>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <footer class="sticky-footer bg-white shadow">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Klinik Sehat 2019</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Siap untuk pergi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika anda ingin mengakhiri sesi anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <a class="btn btn-primary" href="keluar.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  

<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/table-data.js"></script>
<script src="assets/plugins/datatables/extensions/export/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/extensions/export/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables/extensions/export/jszip.min.js"></script>
<script src="assets/plugins/datatables/extensions/export/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/extensions/export/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/extensions/export/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/extensions/export/buttons.print.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#dataTable").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>

</html>
