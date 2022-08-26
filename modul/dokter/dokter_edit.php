<?php

    if( isset( $_REQUEST['submit'] )){
          $id_dokter=$_REQUEST['id_dokter'];
          $nama_dokter=$_REQUEST['nama_dokter'];
          $jk=$_REQUEST['jk'];
          $tarif_dokter=$_REQUEST['tarif_dokter'];
          $tgl_masuk=$_REQUEST['tgl_masuk'];
          $alamat=$_REQUEST['alamat'];
          $tgl_lahir=$_REQUEST['tgl_lahir'];
        $sql = mysqli_query($con, "UPDATE dokter set nama_dokter='$nama_dokter', jk='$jk', tarif_dokter='$tarif_dokter', tgl_masuk='$tgl_masuk', alamat='$alamat', tgl_lahir='$tgl_lahir' WHERE id_dokter='$id_dokter'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=dokter';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_dokter = $_REQUEST['id_dokter'];

    $sql = mysqli_query($con, "SELECT * FROM dokter WHERE id_dokter='$id_dokter'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Dokter</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Dokter </label>
          <input type="text" name="nama_dokter" class="form-control border-1 small" value="<?php echo $row['nama_dokter'] ?>" >
        </div>
        <div class="form-group">
          <label> Tanggal Lahir </label>
          <input type="date" name="tgl_lahir" class="form-control border-1 small" value="<?php echo $row['tgl_lahir'] ?>">
        </div>
        <div class="form-group">
          <label> Jenis Kelamin</label>
          <select name="jk" class="form-control border-1 small">
            <option value="<?php echo $row['jk'] ?>"><?php echo $row['jk'] ?></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Alamat </label>
          <input type="text" name="alamat" class="form-control border-1 small" value="<?php echo $row['alamat'] ?>">
        </div>
        <div class="form-group">
          <label> Tanggal Masuk </label>
          <input type="date" name="tgl_masuk" class="form-control border-1 small" value="<?php echo $row['tgl_masuk'] ?>" >
        </div>
        <div class="form-group">
          <label> Tarif Dokter </label>
          <input type="text" name="tarif_dokter" class="form-control border-1 small" value="<?php echo $row['tarif_dokter'] ?>">
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=dokter" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>