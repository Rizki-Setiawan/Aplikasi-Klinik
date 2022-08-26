<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Alat Kesehatan</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Alat Kesehatan </label>
					<input type="text" name="nama_alkes" class="form-control border-1 small" placeholder="Masukan nama alat kesehatan" >
				</div>
        <div class="form-group">
          <label> Jenis Unit</label>
          <select name="jenis_unit" class="form-control border-1 small">
            <option value="">Pilih Jenis Unit</option>
            <option value="Buah">Buah</option>
            <option value="Box">Box</option>
          </select>
        </div>
        <div class="form-group">
          <label> Harga Jual</label>
          <input type="text" name="harga_jual" class="form-control border-1 small" placeholder="Masukan harga jual" >
        </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Stock Alat Kesehatan</label>
					<input type="text" name="stock_alkes" class="form-control border-1 small" placeholder="Masukan stock alat kesehatan" >
				</div>
        <div class="form-group">
          <label> Tanggal Beli </label>
          <input type="date" name="tgl_beli" class="form-control border-1 small" placeholder="Masukan tanggal beli" >
        </div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=alkes" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_alkes.value == ""){
    alert("Masukan nama alat kesehatan!");
    form.nama_alkes.focus();
    return (false);
  }
  if (form.jenis_unit.value == ""){
    alert("Masukan jenis Unit!");
    form.jenis_unit.focus();
    return (false);
  }
  if (form.harga_jual.value == ""){
    alert("Masukan harga jual!");
    form.harga_jual.focus();
    return (false);
  }
  if (form.stock_alkes.value == ""){
    alert("Masukan stok alat kesehatan!");
    form.stock_alkes.focus();
    return (false);
  }
  if (form.tgl_beli.value == ""){
    alert("Masukan tanggal beli!");
    form.tgl_beli.focus();
    return (false);
  }
 
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_alkes=$_REQUEST['id_alkes'];
    $nama_alkes=$_REQUEST['nama_alkes'];
    $jenis_unit=$_REQUEST['jenis_unit'];
    $tgl_beli=$_REQUEST['tgl_beli'];
    $harga_jual=$_REQUEST['harga_jual'];
    $stock_alkes=$_REQUEST['stock_alkes'];

         
        $sql="INSERT INTO `alkes`(id_alkes,nama_alkes,jenis_unit,harga_jual,stock_alkes,tgl_beli)VALUES(null,'$nama_alkes','$jenis_unit','$harga_jual','$stock_alkes','$tgl_beli')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=alkes';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>