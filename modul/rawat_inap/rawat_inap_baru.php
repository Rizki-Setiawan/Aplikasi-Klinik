<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Rawat Inap</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
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
          <label>Kamar</label>               
                          <select name="id_kamar" class="form-control" >
                            <option value="" disabled selected>Pilih Kamar</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM kamar WHERE NOT EXISTS (SELECT * FROM rawat_inap WHERE kamar.id_kamar=rawat_inap.id_kamar)");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_kamar'];?>">
                              <?php echo $row['nama_kamar'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Lama Menginap (Malam)</label>
					<input type="text" name="lama_menginap" class="form-control border-1 small" placeholder="Masukan lama menginap" >
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
				<a href="./index.php?page=rawat_inap" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.id_pasien.value == ""){
    alert("Masukan nama pasien!");
    form.nama_pasien.focus();
    return (false);
  }
  if (form.id_kamar.value == ""){
    alert("Masukan nama kamar!");
    form.nama_lab.focus();
    return (false);
  }
  if (form.lama_menginap.value == ""){
    alert("Masukan tanggal kunjungan!");
    form.lama_menginap.focus();
    return (false);
  }
  if (form.id_pembayaran.value == ""){
    alert("Masukan tagihan!");
    form.id_pembayaran.focus();
    return (false);
  }
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_rawat_inap=$_REQUEST['id_rawat_inap'];
    $id_pasien=$_REQUEST['id_pasien'];
    $id_kamar=$_REQUEST['id_kamar'];
    $lama_menginap=$_REQUEST['lama_menginap'];
    $id_pembayaran=$_REQUEST['id_pembayaran'];
         
        $sql="INSERT INTO `rawat_inap`(id_rawat_inap,id_pasien,id_kamar,lama_menginap,id_pembayaran)VALUES(null,'$id_pasien','$id_kamar','$lama_menginap','$id_pembayaran')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=rawat_inap';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>