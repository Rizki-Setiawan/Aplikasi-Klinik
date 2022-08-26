<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Diagnosis</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
				<div class="form-group">
					<label> Nama Diagnosis </label>
					<input type="text" name="nama_diagnosis" class="form-control border-1 small" placeholder="Masukan nama diagnosis" >
				</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=diagnosis" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_diagnosis.value == ""){
    alert("Masukan nama diagnosis!");
    form.nama_diagnosis.focus();
    return (false);
  }
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_diagnosis=$_REQUEST['id_diagnosis'];
    $nama_diagnosis=$_REQUEST['nama_diagnosis'];
         
        $sql="INSERT INTO `diagnosis`(id_diagnosis,nama_diagnosis)VALUES(null,'$nama_diagnosis')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=diagnosis';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>