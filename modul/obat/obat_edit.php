<?php

    if( isset( $_REQUEST['submit'] )){
          $id_obat=$_REQUEST['id_obat'];
          $nama_obat=$_REQUEST['nama_obat'];
          $jenis_obat=$_REQUEST['jenis_obat'];
          $harga_jual=$_REQUEST['harga_jual'];
          $stock_obat=$_REQUEST['stock_obat'];
          $tgl_beli=$_REQUEST['tgl_beli'];
          $tgl_kedaluwarsa=$_REQUEST['tgl_kedaluwarsa'];
        $sql = mysqli_query($con, "UPDATE obat set nama_obat='$nama_obat', jenis_obat='$jenis_obat', harga_jual='$harga_jual', stock_obat='$stock_obat', tgl_beli='$tgl_beli', tgl_kedaluwarsa='$tgl_kedaluwarsa' WHERE id_obat='$id_obat'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=obat';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_obat = $_REQUEST['id_obat'];

    $sql = mysqli_query($con, "SELECT * FROM obat WHERE id_obat='$id_obat'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Obat</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Obat </label>
          <input type="text" name="nama_obat" class="form-control border-1 small" value="<?php echo $row['nama_obat'] ?>" >
        </div>
        <div class="form-group">
          <label> Jenis Obat</label>
          <select name="jenis_obat" class="form-control border-1 small">
            <option value="<?php echo $row['jenis_obat'] ?>"><?php echo $row['jenis_obat'] ?></option>
            <option value="Tablet">Tablet</option>
            <option value="Kapsul">Kapsul</option>
            <option value="Sirup">Sirup</option>
          </select>
        </div>
        <div class="form-group">
          <label> Harga Jual</label>
          <input type="text" name="harga_jual" class="form-control border-1 small" value="<?php echo $row['harga_jual'] ?>" >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Stock Obat</label>
          <input type="text" name="stock_obat" class="form-control border-1 small" value="<?php echo $row['stock_obat'] ?>" >
        </div>
        <div class="form-group">
          <label> Tanggal Beli </label>
          <input type="date" name="tgl_beli" class="form-control border-1 small" value="<?php echo $row['tgl_beli'] ?>" >
        </div>
        <div class="form-group">
          <label> Tanggal Kedaluwarsa </label>
          <input type="date" name="tgl_kedaluwarsa" class="form-control border-1 small" value="<?php echo $row['tgl_kedaluwarsa'] ?>">
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
<?php
    }
}
?>