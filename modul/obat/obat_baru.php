<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Obat</h1><br>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
		</div>
		 <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
		 <div class="card-body">
		 <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Nama Obat </label>
					<input type="text" name="nama_obat" class="form-control border-1 small" placeholder="Masukan nama obat" >
				</div>
        <div class="form-group">
          <label> Jenis Obat</label>
          <select name="jenis_obat" class="form-control border-1 small">
            <option value="">Pilih Jenis Obat</option>
            <option value="Tablet">Tablet</option>
            <option value="Kapsul">Kapsul</option>
            <option value="Sirup">Cair</option>
          </select>
        </div>
        <div class="form-group">
          <label> Harga Jual</label>
          <input type="text" name="harga_jual" class="form-control border-1 small" placeholder="Masukan harga jual" >
        </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label> Stock Obat</label>
					<input type="text" name="stock_obat" class="form-control border-1 small" placeholder="Masukan stock obat" >
				</div>
        <div class="form-group">
          <label> Tanggal Beli </label>
          <input type="date" name="tgl_beli" class="form-control border-1 small" placeholder="Masukan tanggal beli" >
        </div>
				<div class="form-group">
					<label> Tanggal Kedaluwarsa </label>
					<input type="date" name="tgl_kedaluwarsa" class="form-control border-1 small" placeholder="Masukan tanggal kedaluwarsa">
				</div>
			</div>
			</div>
		  </div>
		  <div class="card-footer">
				<a href="./index.php?page=obat" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
		  </div>
		  </form>
	</div>
</div>
<script type="text/javascript">
function validasi_input(form){
   if (form.nama_obat.value == ""){
    alert("Masukan nama obat!");
    form.nama_obat.focus();
    return (false);
  }
  if (form.jenis_obat.value == ""){
    alert("Masukan jenis obat!");
    form.jenis_obat.focus();
    return (false);
  }
  if (form.harga_jual.value == ""){
    alert("Masukan harga jual!");
    form.harga_jual.focus();
    return (false);
  }
  if (form.stock_obat.value == ""){
    alert("Masukan stok obat!");
    form.stock_obat.focus();
    return (false);
  }
  if (form.tgl_beli.value == ""){
    alert("Masukan tanggal beli!");
    form.tgl_beli.focus();
    return (false);
  }
  if (form.tgl_kedaluwarsa.value == ""){
    alert("Masukan tanggal kedaluwarsa!");
    form.tgl_kedaluwarsa.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $id_obat=$_REQUEST['id_obat'];
    $nama_obat=$_REQUEST['nama_obat'];
    $jenis_obat=$_REQUEST['jenis_obat'];
    $tgl_beli=$_REQUEST['tgl_beli'];
    $tgl_kedaluwarsa=$_REQUEST['tgl_kedaluwarsa'];
    $harga_jual=$_REQUEST['harga_jual'];
    $stock_obat=$_REQUEST['stock_obat'];

         
        $sql="INSERT INTO `obat`(id_obat,nama_obat,jenis_obat,harga_jual,stock_obat,tgl_beli,tgl_kedaluwarsa)VALUES(null,'$nama_obat','$jenis_obat','$harga_jual','$stock_obat','$tgl_beli','$tgl_kedaluwarsa')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=obat';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>