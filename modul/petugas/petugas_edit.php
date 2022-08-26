<?php

    if( isset( $_REQUEST['submit'] )){
          $id_petugas=$_REQUEST['id_petugas'];
          $nama_petugas=$_REQUEST['nama_petugas'];
          $jk=$_REQUEST['jk'];
          $tarif_petugas=$_REQUEST['tarif_petugas'];
          $tgl_masuk=$_REQUEST['tgl_masuk'];
          $alamat=$_REQUEST['alamat'];
          $tgl_lahir=$_REQUEST['tgl_lahir'];
        $sql = mysqli_query($con, "UPDATE petugas set nama_petugas='$nama_petugas', jk='$jk', tarif_petugas='$tarif_petugas', tgl_masuk='$tgl_masuk', alamat='$alamat', tgl_lahir='$tgl_lahir' WHERE id_petugas='$id_petugas'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=petugas';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_petugas = $_REQUEST['id_petugas'];

    $sql = mysqli_query($con, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Petugas </label>
          <input type="text" name="nama_petugas" class="form-control border-1 small" value="<?php echo $row['nama_petugas'] ?>" >
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
          <input type="text" name="alamat" class="form-control border-1 small" value="<?php echo $row['alamat'] ?>"  >
        </div>
        <div class="form-group">
          <label> Tanggal Masuk </label>
          <input type="date" name="tgl_masuk" class="form-control border-1 small" value="<?php echo $row['tgl_masuk'] ?>">
        </div>
        <div class="form-group">
          <label> Tarif Petugas </label>
          <input type="text" name="tarif_petugas" class="form-control border-1 small" value="<?php echo $row['tarif_petugas'] ?>">
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=petugas" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>