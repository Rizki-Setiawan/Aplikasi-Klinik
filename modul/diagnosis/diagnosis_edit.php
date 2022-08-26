<?php

    if( isset( $_REQUEST['submit'] )){
          $id_diagnosis=$_REQUEST['id_diagnosis'];
          $nama_diagnosis=$_REQUEST['nama_diagnosis'];

        $sql = mysqli_query($con, "UPDATE diagnosis set nama_diagnosis='$nama_diagnosis'WHERE id_diagnosis='$id_diagnosis'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=diagnosis';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_diagnosis= $_REQUEST['id_diagnosis'];

    $sql = mysqli_query($con, "SELECT * FROM diagnosis WHERE id_diagnosis='$id_diagnosis'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Diagnosis</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
     <div class="card-body">
        <div class="form-group">
          <label> Nama Diagnosis </label>
          <input type="text" name="nama_diagnosis" class="form-control border-1 small" value="<?php echo $row['nama_diagnosis'] ?>">
        </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=diagnosis" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>