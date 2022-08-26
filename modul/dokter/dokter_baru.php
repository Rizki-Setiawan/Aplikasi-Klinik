<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Dokter</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Dokter </label>
					<input type="text" name="nama_dokter" class="form-control border-1 small" placeholder="Masukan nama dokter" >
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
					<input type="text" name="alamat" class="form-control border-1 small" placeholder="Masukan alamat dokter" >
				</div>
        <div class="form-group">
          <label> Tanggal Masuk </label>
          <input type="date" name="tgl_masuk" class="form-control border-1 small" placeholder="Masukan tanggal masuk" >
        </div>
				<div class="form-group">
					<label> Tarif Dokter </label>
					<input type="text" name="tarif_dokter" class="form-control border-1 small" placeholder="Masukan tarif dokter">
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=dokter" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_dokter.value == ""){
    alert("Masukan nama dokter!");
    form.nama_dokter.focus();
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
  if (form.tarif_dokter.value == ""){
    alert("Masukan tarif dokter!");
    form.tarif_dokter.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_dokter=$_REQUEST['id_dokter'];
    $nama_dokter=$_REQUEST['nama_dokter'];
    $jk=$_REQUEST['jk'];
    $tgl_lahir=$_REQUEST['tgl_lahir'];
    $tgl_masuk=$_REQUEST['tgl_masuk'];
    $alamat=$_REQUEST['alamat'];
    $tarif_dokter=$_REQUEST['tarif_dokter'];

         
        $sql="INSERT INTO `dokter`(id_dokter,nama_dokter,tgl_lahir,jk,alamat,tgl_masuk,tarif_dokter)VALUES(null,'$nama_dokter','$tgl_lahir','$jk','$alamat','$tgl_masuk','$tarif_dokter')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=dokter';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>