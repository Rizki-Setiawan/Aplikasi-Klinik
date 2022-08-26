<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Petugas </label>
					<input type="text" name="nama_petugas" class="form-control border-1 small" placeholder="Masukan nama petugas" >
				</div>
        <div class="form-group">
          <label> Tanggal Lahir </label>
          <input type="date" name="tgl_lahir" class="form-control border-1 small" placeholder="Masukan tanggal lahir" >
        </div>
				<div class="form-group">
					<label> Jenis Kelamin</label>
					<select name="jk" class="form-control border-1 small">
						<option value="">Pilih Jenis kelamin</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Alamat </label>
					<input type="text" name="alamat" class="form-control border-1 small" placeholder="Masukan alamat petugas" >
				</div>
        <div class="form-group">
          <label> Tanggal Masuk </label>
          <input type="date" name="tgl_masuk" class="form-control border-1 small" placeholder="Masukan tanggal masuk" >
        </div>
				<div class="form-group">
					<label> Tarif Petugas </label>
					<input type="text" name="tarif_petugas" class="form-control border-1 small" placeholder="Masukan tarif petugas">
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=petugas" class="btn btn-warning">Kembali</a>
        <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_petugas.value == ""){
    alert("Masukan nama petugas!");
    form.nama_petugas.focus();
    return (false);
  }
  if (form.jk.value == ""){
    alert("Masukan jenis kelamin!");
    form.jk.focus();
    return (false);
  }
  if (form.tgl_lahir.value == ""){
    alert("Masukan tanggal lahir!");
    form.tgl_lahir.focus();
    return (false);
  }
  if (form.tgl_masuk.value == ""){
    alert("Masukan tgl_masuk!");
    form.tgl_masuk.focus();
    return (false);
  }
  if (form.alamat.value == ""){
    alert("Masukan alamat pasien!");
    form.alamat.focus();
    return (false);
  }
  if (form.tarif_petugas.value == ""){
    alert("Masukan tarif petugas!");
    form.tarif_petugas.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_petugas=$_REQUEST['id_petugas'];
    $nama_petugas=$_REQUEST['nama_petugas'];
    $jk=$_REQUEST['jk'];
    $tgl_lahir=$_REQUEST['tgl_lahir'];
    $tgl_masuk=$_REQUEST['tgl_masuk'];
    $alamat=$_REQUEST['alamat'];
    $tarif_petugas=$_REQUEST['tarif_petugas'];

         
        $sql="INSERT INTO `petugas`(id_petugas,nama_petugas,tgl_lahir,jk,alamat,tgl_masuk,tarif_petugas)VALUES(null,'$nama_petugas','$tgl_lahir','$jk','$alamat','$tgl_masuk','$tarif_petugas')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=petugas';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>