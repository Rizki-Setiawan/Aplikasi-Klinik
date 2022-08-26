<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Lab</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Lab </label>
					<input type="text" name="nama_lab" class="form-control border-1 small" placeholder="Masukan nama lab" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Tarif Lab</label>
					<input type="text" name="tarif_lab" class="form-control border-1 small" placeholder="Masukan tarif lab" >
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=lab" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_lab.value == ""){
    alert("Masukan nama lab!");
    form.nama_lab.focus();
    return (false);
  }
  if (form.tarif_lab.value == ""){
    alert("Masukan tarif lab!");
    form.tarif_lab.focus();
    return (false);
  }
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_lab=$_REQUEST['id_lab'];
    $nama_lab=$_REQUEST['nama_lab'];
    $tarif_lab=$_REQUEST['tarif_lab'];
         
        $sql="INSERT INTO `lab`(id_lab,nama_lab,tarif_lab)VALUES(null,'$nama_lab','$tarif_lab')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=lab';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>