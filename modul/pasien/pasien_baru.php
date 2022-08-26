<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Pasien </label>
					<input type="text" name="nama_pasien" class="form-control border-1 small" placeholder="Masukan nama pasien" >
				</div>
				<div class="form-group">
					<label> Jenis Kelamin</label>
					<select name="jk" class="form-control border-1 small">
						<option value="">Pilih Jenis kelamin</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label> Usia </label>
					<input type="text" name="usia" class="form-control border-1 small" placeholder="Masukan usia pasien">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Pekerjaan </label>
					<input type="text" name="pekerjaan" class="form-control border-1 small" placeholder="Masukan pekerjaan pasien" >
				</div>
				<div class="form-group">
					<label> Alamat </label>
					<input type="text" name="alamat" class="form-control border-1 small" placeholder="Masukan alamat pasien" >
				</div>
				<div class="form-group">
					<label> No. Telepon </label>
					<input type="text" name="no_telp" class="form-control border-1 small" placeholder="Masukan no. telepon">
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=pasien" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_pasien.value == ""){
    alert("Masukan nama pasien!");
    form.nama_pasien.focus();
    return (false);
  }
  if (form.jk.value == ""){
    alert("Masukan jenis kelamin!");
    form.jk.focus();
    return (false);
  }
  if (form.usia.value == ""){
    alert("Masukan usia pasien!");
    form.usia.focus();
    return (false);
  }
  if (form.pekerjaan.value == ""){
    alert("Masukan pekerjaan pasien!");
    form.pekerjaan.focus();
    return (false);
  }
  if (form.alamat.value == ""){
    alert("Masukan alamat pasien!");
    form.alamat.focus();
    return (false);
  }
  if (form.no_telp.value == ""){
    alert("Masukan no. telepon!");
    form.no_telp.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_pasien=$_REQUEST['id_pasien'];
    $nama_pasien=$_REQUEST['nama_pasien'];
    $jk=$_REQUEST['jk'];
    $usia=$_REQUEST['usia'];
    $pekerjaan=$_REQUEST['pekerjaan'];
    $alamat=$_REQUEST['alamat'];
    $no_telp=$_REQUEST['no_telp'];
         
        $sql="INSERT INTO `pasien`(id_pasien,nama_pasien,jk,usia,pekerjaan,alamat,no_telp)VALUES(null,'$nama_pasien','$jk','$usia','$pekerjaan','$alamat','$no_telp')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=pasien';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>