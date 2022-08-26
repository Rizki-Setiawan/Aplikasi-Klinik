<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Kamar</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Kamar </label>
					<input type="text" name="nama_kamar" class="form-control border-1 small" placeholder="Masukan nama kamar" >
				</div>
				<div class="form-group">
					<label> Jenis Kamar </label>
					<select name="jenis_kamar" class="form-control border-1">
						<option value="">Pilih Jenis Kamar</option>
						<option value="Biasa">Biasa</option>
						<option value="Vip">Vip</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Tarif Kamar</label>
					<input type="text" name="tarif_kamar" class="form-control border-1 small" placeholder="Masukan tarif lab" >
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=kamar" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_kamar.value == ""){
    alert("Masukan nama kamar!");
    form.nama_kamar.focus();
    return (false);
  }
  if (form.jenis_kamar.value == ""){
    alert("Masukan jenis kamar!");
    form.jenis_kamar.focus();
    return (false);
  }
  if (form.tarif_kamar.value == ""){
    alert("Masukan tarif kamar!");
    form.tarif_kamar.focus();
    return (false);
  }
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_kamar=$_REQUEST['id_kamar'];
    $nama_kamar=$_REQUEST['nama_kamar'];
    $jenis_kamar=$_REQUEST['jenis_kamar'];
    $tarif_kamar=$_REQUEST['tarif_kamar'];
         
        $sql="INSERT INTO `kamar`(id_kamar,nama_kamar,jenis_kamar,tarif_kamar)VALUES(null,'$nama_kamar','$jenis_kamar','$tarif_kamar')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=kamar';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>