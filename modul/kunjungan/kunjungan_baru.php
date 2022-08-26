<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Kunjungan</h1><br>
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
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Tanggal Kunjungan</label>
					<input type="date" name="tgl_kunjungan" class="form-control border-1 small" placeholder="Masukan tanggal kunjungan" >
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=kunjungan" class="btn btn-warning">Kembali</a>
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
  if (form.tgl_kunjungan.value == ""){
    alert("Masukan tanggal kunjungan!");
    form.tgl_kunjungan.focus();
    return (false);
  }
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_kunjungan=$_REQUEST['id_kunjungan'];
    $id_pasien=$_REQUEST['id_pasien'];
    $tgl_kunjungan=$_REQUEST['tgl_kunjungan'];
         
        $sql="INSERT INTO `kunjungan`(id_kunjungan,id_pasien,tgl_kunjungan)VALUES(null,'$id_pasien','$tgl_kunjungan')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=kunjungan';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>