<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Rawat Jalan</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
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
  
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_rawat_jalan=$_REQUEST['id_rawat_jalan'];
    $id_pasien=$_REQUEST['id_pasien'];
         
        $sql="INSERT INTO `rawat_jalan`(id_rawat_jalan,id_pasien)VALUES(null,'$id_pasien')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=rawat_jalan';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>