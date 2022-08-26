<?php

    if( isset( $_REQUEST['submit'] )){
          $id_pembayaran=$_REQUEST['id_pembayaran'];
          $tgl_pembayaran=$_REQUEST['tgl_pembayaran'];
          $status_pembayaran=$_REQUEST['status_pembayaran'];

        $sql = mysqli_query($con, "UPDATE pembayaran set tgl_pembayaran='$tgl_pembayaran', status_pembayaran='$status_pembayaran' WHERE id_pembayaran='$id_pembayaran'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=pembayaran';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_pembayaran = $_REQUEST['id_pembayaran'];

    $sql = mysqli_query($con, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
    while($row = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post" >
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label> Tanggal Pembayaran </label>
          <input type="date" name="tgl_pembayaran" class="form-control border-1 small" value="<?php echo $row['tgl_pembayaran'] ?>" >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Status Pembayaran</label>
          <select name="status_pembayaran" class="form-control border-1 small">
            <option value="<?php echo $row['status_pembayaran'] ?>"><?php echo $row['status_pembayaran'] ?></option>
            <option value="Lunas">Lunas</option>
          </select>
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=pembayaran" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>