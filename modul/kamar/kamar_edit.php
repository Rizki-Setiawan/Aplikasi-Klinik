<?php

    if( isset( $_REQUEST['submit'] )){
          $id_kamar=$_REQUEST['id_kamar'];
          $nama_kamar=$_REQUEST['nama_kamar'];
          $jenis_kamar=$_REQUEST['jenis_kamar'];
          $tarif_kamar=$_REQUEST['tarif_kamar'];

        $sql = mysqli_query($con, "UPDATE kamar set nama_kamar='$nama_kamar', tarif_kamar='$tarif_kamar',jenis_kamar='$jenis_kamar' WHERE id_kamar='$id_kamar'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=kamar';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_kamar = $_REQUEST['id_kamar'];

    $sql = mysqli_query($con, "SELECT * FROM kamar WHERE id_kamar='$id_kamar'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Kamar</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Nama Kamar </label>
          <input type="text" name="nama_kamar" class="form-control border-1 small" value="<?php echo $row['nama_kamar'] ?>">
        </div>
        <div class="form-group">
          <label> Jenis Kamar </label>
          <select name="jenis_kamar" class="form-control border-1">
            <option value="<?php echo $row['jenis_kamar'] ?>"><?php echo $row['jenis_kamar'] ?></option>
            <option value="Biasa">Biasa</option>
            <option value="Vip">Vip</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Tarif Kamar</label>
          <input type="text" name="tarif_kamar" class="form-control border-1 small" value="<?php echo $row['tarif_kamar'] ?>" >
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=kamar" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>