<?php

    if( isset( $_REQUEST['submit'] )){
          $id_alkes=$_REQUEST['id_alkes'];
          $nama_alkes=$_REQUEST['nama_alkes'];
          $jenis_unit=$_REQUEST['jenis_unit'];
          $harga_jual=$_REQUEST['harga_jual'];
          $stock_alkes=$_REQUEST['stock_alkes'];
          $tgl_beli=$_REQUEST['tgl_beli'];
        $sql = mysqli_query($con, "UPDATE alkes set nama_alkes='$nama_alkes', jenis_unit='$jenis_unit', harga_jual='$harga_jual', stock_alkes='$stock_alkes', tgl_beli='$tgl_beli' WHERE id_alkes='$id_alkes'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=alkes';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_alkes = $_REQUEST['id_alkes'];

    $sql = mysqli_query($con, "SELECT * FROM alkes WHERE id_alkes='$id_alkes'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Alat Kesehatan</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Alat Kesehatan </label>
          <input type="text" name="nama_alkes" class="form-control border-1 small" value="<?php echo $row['nama_alkes'] ?>">
        </div>
        <div class="form-group">
          <label> Jenis Unit</label>
          <select name="jenis_unit" class="form-control border-1 small">
            <option value="<?php echo $row['jenis_unit'] ?>"><?php echo $row['jenis_unit'] ?></option>
            <option value="Buah">Buah</option>
            <option value="Box">Box</option>
          </select>
        </div>
        <div class="form-group">
          <label> Harga Jual</label>
          <input type="text" name="harga_jual" class="form-control border-1 small" value="<?php echo $row['harga_jual'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Stock Alat Kesehatan</label>
          <input type="text" name="stock_alkes" class="form-control border-1 small" value="<?php echo $row['stock_alkes'] ?>">
        </div>
        <div class="form-group">
          <label> Tanggal Beli </label>
          <input type="date" name="tgl_beli" class="form-control border-1 small" value="<?php echo $row['tgl_beli'] ?>" >
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
<?php
    }
}
?>