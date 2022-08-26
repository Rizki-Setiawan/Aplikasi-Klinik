<?php
if( isset($_REQUEST['page'] )){

  $page = $_REQUEST['page'];

  switch( $page ){
    case 'dashboard':
      include "modul/dashboard/dashboard.php";
      break;
    case 'alkes':
      include "modul/alkes/alkes.php";
      break;
    case 'tam_alkes':
      include "modul/alkes/alkes_baru.php";
      break;
    case 'diagnosis':
      include "modul/diagnosis/diagnosis.php";
      break;
    case 'tam_diagnosis':
      include "modul/diagnosis/diagnosis_baru.php";
      break;
    case 'dokter':
      include "modul/dokter/dokter.php";
      break;
    case 'tam_dokter':
      include "modul/dokter/dokter_baru.php";
      break;
    case 'kamar':
      include "modul/kamar/kamar.php";
      break;
    case 'tam_kamar':
      include "modul/kamar/kamar_baru.php";
      break;
    case 'kunjungan':
      include "modul/kunjungan/kunjungan.php";
      break;
    case 'lab':
      include "modul/lab/lab.php";
      break;
    case 'tam_lab':
      include "modul/lab/lab_baru.php";
      break;
    case 'obat':
      include "modul/obat/obat.php";
      break;
    case 'tam_obat':
      include "modul/obat/obat_baru.php";
      break;
    case 'pasien':
      include "modul/pasien/pasien.php";
      break;
    case 'tam_pasien':
      include "modul/pasien/pasien_baru.php";
      break;
    case 'pembayaran':
      include "modul/pembayaran/pembayaran.php";
      break;
    case 'pemeriksaan':
      include "modul/pemeriksaan/pemeriksaan.php";
      break;
    case 'petugas':
      include "modul/petugas/petugas.php";
      break;
    case 'tam_petugas':
      include "modul/petugas/petugas_baru.php";
      break;
    case 'rawat_inap':
      include "modul/rawat_inap/rawat_inap.php";
      break;
    case 'rawat_jalan':
      include "modul/rawat_jalan/rawat_jalan.php";
      break;
    case 'tindakan':
      include "modul/tindakan/tindakan.php";
      break;
    case 'tam_tindakan':
      include "modul/tindakan/tindakan_baru.php";
      break;
    case 'pengguna':
      include "modul/pengguna/pengguna.php";
      break;
    case 'tam_pengguna':
      include "modul/pengguna/pengguna_baru.php";
      break;
   
  }
} else {
?>
    <div class="jumbotron">
      <h2>Page Not Found</h2>
    </div>
<?php
}


?>
