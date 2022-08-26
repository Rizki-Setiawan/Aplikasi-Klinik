<?php

    if( isset( $_REQUEST['submit'] )){
          $id_pasien=$_REQUEST['id_pasien'];
          $nama_pasien=$_REQUEST['nama_pasien'];
          $jk=$_REQUEST['jk'];
          $usia=$_REQUEST['usia'];
          $pekerjaan=$_REQUEST['pekerjaan'];
          $alamat=$_REQUEST['alamat'];
          $no_telp=$_REQUEST['no_telp'];
        $sql = mysqli_query($con, "UPDATE pasien set nama_pasien='$nama_pasien', jk='$jk', usia='$usia', pekerjaan='$pekerjaan', alamat='$alamat', no_telp='$no_telp' WHERE id_pasien='$id_pasien'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=pasien';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_pasien = $_REQUEST['id_pasien'];

    $sql = mysqli_query($con, "SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Pasien </label>
          <input type="text" name="nama_pasien" class="form-control border-1 small" value="<?php echo $row['nama_pasien'] ?>" >
        </div>
        <div class="form-group">
          <label> Jenis Kelamin</label>
          <select name="jk" class="form-control border-1 small">
            <option value="<?php echo $row['jk'] ?>"><?php echo $row['jk'] ?></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label> Usia </label>
          <input type="text" name="usia" class="form-control border-1 small" value="<?php echo $row['usia'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Pekerjaan </label>
          <input type="text" name="pekerjaan" class="form-control border-1 small" value="<?php echo $row['pekerjaan'] ?>"  >
        </div>
        <div class="form-group">
          <label> Alamat </label>
          <input type="text" name="alamat" class="form-control border-1 small" value="<?php echo $row['alamat'] ?>">
        </div>
        <div class="form-group">
          <label> No. Telepon </label>
          <input type="text" name="no_telp" class="form-control border-1 small" value="<?php echo $row['no_telp'] ?>">
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=pasien" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>