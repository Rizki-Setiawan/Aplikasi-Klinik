<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Pemeriksaan</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-4">
				<div class="form-group">
          <label>Nama Pasien</label>               
                          <select name="id_pasien" class="form-control" >
                            <option value="" disabled selected>Pilih Pasien</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM pasien");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_pasien'];?>">
                              <?php echo $row['nama_pasien'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
        <div class="form-group">
          <label> Keluhan </label>
          <input type="text" name="keluhan" class="form-control border-1 small" placeholder="Masukan keluhan pasien" >
        </div>
				<div class="form-group">
					<label> Tanggal Periksa</label>
					<input type="date" name="tgl_periksa" class="form-control border-1 small" placeholder="Masukan Tanggal periksa"> 
				</div>
        <div class="form-group">
          <label>Nama Dokter</label>               
                          <select name="id_dokter" class="form-control" >
                            <option value="" disabled selected>Pilih dokter</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM dokter");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_dokter'];?>">
                              <?php echo $row['nama_dokter'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
        <div class="form-group">
          <label>Nama Diagnosis</label>               
                          <select name="id_diagnosis" class="form-control" >
                            <option value="" disabled selected>Pilih Diagnosis</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM diagnosis");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_diagnosis'];?>">
                              <?php echo $row['nama_diagnosis'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
				</div>
			<div class="col-md-4">
				 <div class="form-group">
          <label>Nama Lab</label>               
                          <select name="id_lab" class="form-control" >
                            <option value="" disabled selected>Pilih Lab</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM lab");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_lab'];?>">
                              <?php echo $row['nama_lab'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
         <div class="form-group">
          <label>Nama Petugas</label>               
                          <select name="id_petugas" class="form-control" >
                            <option value="" disabled selected>Pilih Petugas</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM petugas");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_petugas'];?>">
                              <?php echo $row['nama_petugas'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
        <div class="form-group">
          <label>Nama Tindakan</label>               
                          <select name="id_tindakan" class="form-control" >
                            <option value="" disabled selected>Pilih Tindakan</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM tindakan");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_tindakan'];?>">
                              <?php echo $row['nama_tindakan'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
        <div class="form-group">
          <label>Nama Obat</label>               
                          <select name="id_obat" class="form-control" >
                            <option value="" disabled selected>Pilih Obat</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM obat");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_obat'];?>">
                              <?php echo $row['nama_obat'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
			</div>
      <div class="col-md-4">
        <div class="form-group">
          <label> Jumlah Obat </label>
          <input type="text" name="jumlah_obat" class="form-control border-1 small" placeholder="Masukan jumlah obat" >
        </div>
         <div class="form-group">
          <label>Nama Alat Kesehatan</label>               
                          <select name="id_alkes" class="form-control" >
                            <option value="" disabled selected>Pilih Alat Kesehatan</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM alkes");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_alkes'];?>">
                              <?php echo $row['nama_alkes'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
        <div class="form-group">
          <label> Jumlah Alat Kesehatan </label>
          <input type="text" name="jumlah_alkes" class="form-control border-1 small" placeholder="Masukan Jumlah Alat kesehatan" >
        </div>
        <div class="form-group">
          <label>Tagihan untuk</label>               
                          <select name="id_pembayaran" class="form-control" >
                            <option value="" disabled selected>Pilih pasien</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT pasien.nama_pasien,pembayaran.id_pembayaran FROM pasien,pembayaran where pasien.id_pasien = pembayaran.id_pasien");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_pembayaran'];?>">
                              <?php echo $row['nama_pasien'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
      </div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=pemeriksaan" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.id_pasien.value == ""){
    alert("Masukan nama pasien!");
    form.id_pasien.focus();
    return (false);
  }
  if (form.keluhan.value == ""){
    alert("Masukan keluhan pasien!");
    form.keluhan.focus();
    return (false);
  }
  if (form.tgl_periksa.value == ""){
    alert("Masukan tanggal periksa!");
    form.tgl_periksa.focus();
    return (false);
  }
  if (form.id_dokter.value == ""){
    alert("Masukan nama_dokter!");
    form.id_dokter.focus();
    return (false);
  }
  if (form.id_diagnosis.value == ""){
    alert("Masukan nama diagnosis!");
    form.id_diagnosis.focus();
    return (false);
  }
  if (form.id_lab.value == ""){
    alert("Masukan nama lab!");
    form.id_lab.focus();
    return (false);
  }
  if (form.id_petugas.value == ""){
    alert("Masukan nama petugas!");
    form.id_petugas.focus();
    return (false);
  }
  if (form.id_tindakan.value == ""){
    alert("Masukan nama tindakan!");
    form.id_tindakan.focus();
    return (false);
  }
  if (form.id_obat.value == ""){
    alert("Masukan nama obat!");
    form.id_lab.focus();
    return (false);
  }
  if (form.jumlah_obat.value == ""){
    alert("Masukan Jumlah Obat!");
    form.jumlah_obat.focus();
    return (false);
  }
  if (form.id_alkes.value == ""){
    alert("Masukan nama alat kesehatan!");
    form.id_alkes.focus();
    return (false);
  }
  if (form.jumlah_alkes.value == ""){
    alert("Masukan jumlah alkes!");
    form.jumlah_alkes.focus();
    return (false);
  }
  if (form.id_pembayaran.value == ""){
    alert("Masukan Tagihan!");
    form.id_pembayaran.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_pemeriksaan=$_REQUEST['id_pemeriksaan'];
    $id_pasien=$_REQUEST['id_pasien'];
    $keluhan=$_REQUEST['keluhan'];
    $tgl_periksa=$_REQUEST['tgl_periksa'];
    $id_dokter=$_REQUEST['id_dokter'];
    $id_diagnosis=$_REQUEST['id_diagnosis'];
    $id_lab=$_REQUEST['id_lab'];
    $id_petugas=$_REQUEST['id_petugas'];
    $id_tindakan=$_REQUEST['id_tindakan'];
    $id_obat=$_REQUEST['id_obat'];
    $jumlah_obat=$_REQUEST['jumlah_obat'];
    $id_alkes=$_REQUEST['id_alkes'];
    $jumlah_alkes=$_REQUEST['jumlah_alkes'];
    $id_pembayaran=$_REQUEST['id_pembayaran'];

         
        $sql="INSERT INTO `pemeriksaan`(id_pemeriksaan, id_pasien, keluhan, tgl_periksa, id_dokter, id_diagnosis, id_lab, id_petugas, id_tindakan, id_obat, jumlah_obat, id_alkes, jumlah_alkes, id_pembayaran)VALUES(null,'$id_pasien','$keluhan','$tgl_periksa','$id_dokter','$id_diagnosis','$id_lab' ,'$id_petugas' ,'$id_tindakan' ,'$id_obat' ,'$jumlah_obat' ,'$id_alkes' ,'$jumlah_alkes' ,'$id_pembayaran')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=pemeriksaan';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>