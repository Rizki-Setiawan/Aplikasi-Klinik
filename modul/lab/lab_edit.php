<?php

    if( isset( $_REQUEST['submit'] )){
          $id_lab=$_REQUEST['id_lab'];
          $nama_lab=$_REQUEST['nama_lab'];
          $tarif_lab=$_REQUEST['tarif_lab'];

        $sql = mysqli_query($con, "UPDATE lab set nama_lab='$nama_lab', tarif_lab='$tarif_lab' WHERE id_lab='$id_lab'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=lab';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_lab = $_REQUEST['id_lab'];

    $sql = mysqli_query($con, "SELECT * FROM lab WHERE id_lab='$id_lab'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Lab</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post" >
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Lab </label>
          <input type="text" name="nama_lab" class="form-control border-1 small" value="<?php echo $row['nama_lab'] ?>" >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Tarif Lab</label>
          <input type="text" name="tarif_lab" class="form-control border-1 small" value="<?php echo $row['tarif_lab'] ?>"  >
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=lab" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>