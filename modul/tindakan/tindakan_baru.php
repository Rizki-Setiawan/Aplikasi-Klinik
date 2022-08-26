<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Tindakan</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Tindakan </label>
					<input type="text" name="nama_tindakan" class="form-control border-1 small" placeholder="Masukan nama tindakan" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Tarif Tindakan</label>
					<input type="text" name="tarif_tindakan" class="form-control border-1 small" placeholder="Masukan tarif tindakan" >
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=tindakan" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_tindakan.value == ""){
    alert("Masukan nama tindakan!");
    form.nama_tindakan.focus();
    return (false);
  }
  if (form.tarif_tindakan.value == ""){
    alert("Masukan tarif tindakan!");
    form.tarif_tindakan.focus();
    return (false);
  }
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_tindakan=$_REQUEST['id_tindakan'];
    $nama_tindakan=$_REQUEST['nama_tindakan'];
    $tarif_tindakan=$_REQUEST['tarif_tindakan'];
         
        $sql="INSERT INTO `tindakan`(id_tindakan,nama_tindakan,tarif_tindakan)VALUES(null,'$nama_tindakan','$tarif_tindakan')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=tindakan';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>