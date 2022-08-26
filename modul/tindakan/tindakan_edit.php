<?php

    if( isset( $_REQUEST['submit'] )){
          $id_tindakan=$_REQUEST['id_tindakan'];
          $nama_tindakan=$_REQUEST['nama_tindakan'];
          $tarif_tindakan=$_REQUEST['tarif_tindakan'];

        $sql = mysqli_query($con, "UPDATE tindakan set nama_tindakan='$nama_tindakan', tarif_tindakan='$tarif_tindakan' WHERE id_tindakan='$id_tindakan'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=tindakan';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_tindakan = $_REQUEST['id_tindakan'];

    $sql = mysqli_query($con, "SELECT * FROM tindakan WHERE id_tindakan='$id_tindakan'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Tindakan</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Tindakan </label>
          <input type="text" name="nama_tindakan" class="form-control border-1 small" value="<?php echo $row['nama_tindakan'] ?>" >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Tarif Tindakan</label>
          <input type="text" name="tarif_tindakan" class="form-control border-1 small" value="<?php echo $row['tarif_tindakan'] ?>" >
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=tindakan" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>