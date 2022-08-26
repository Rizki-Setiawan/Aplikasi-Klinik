<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Pengguna </label>
					<input type="text" name="username" class="form-control border-1 small" placeholder="Masukan nama pengguna" >
				</div>
				<div class="form-group">
					<label> Email </label>
					<input type="text" name="email" class="form-control border-1 small" placeholder="Masukan email pengguna" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Password </label>
					<input type="password" name="password" class="form-control border-1 small" placeholder="Masukan password" >
				</div>
				<div class="form-group">
					<label> Level</label>
					<select name="level" class="form-control border-1 small">
						<option value="">Pilih level pengguna</option>
						<option value="admin">Admin</option>
						<option value="operator">Operator</option>
					</select>
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=pengguna" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.username.value == ""){
    alert("Masukan nama pengguna!");
    form.username.focus();
    return (false);
  }
  if (form.email.value == ""){
    alert("Masukan email pengguna!");
    form.email.focus();
    return (false);
  }
  if (form.password.value == ""){
    alert("Masukan password!");
    form.password.focus();
    return (false);
  }
  if (form.level.value == ""){
    alert("Masukan level pengguna!");
    form.level.focus();
    return (false);
  }
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_user=$_REQUEST['id_user'];
    $username=$_REQUEST['username'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    $level=$_REQUEST['level'];
         
        $sql="INSERT INTO `login`(id_user,username,email,password,level)VALUES(null,'$username','$email',MD5('$password'),'$level')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=pengguna';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>