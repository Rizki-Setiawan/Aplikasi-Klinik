<?php

    if( isset( $_REQUEST['submit'] )){
          $id_kunjungan=$_REQUEST['id_kunjungan'];
          $id_pasien=$_REQUEST['id_pasien'];
          $tgl_kunjungan=$_REQUEST['tgl_kunjungan'];

        $sql = mysqli_query($con, "UPDATE `kunjungan` SET `tgl_kunjungan` = '$tgl_kunjungan',id_pasien='$id_pasien' WHERE kunjungan.id_kunjungan ='$id_kunjungan'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=kunjungan';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_kunjungan = $_REQUEST['id_kunjungan'];

    $sql = mysqli_query($con, "SELECT * from kunjungan WHERE id_kunjungan='$id_kunjungan'");
    while($row1 = mysqli_fetch_array($sql)){

?>

<div class="col-xl-12 col-lg-7">
 <h1 class="h3 mb-0 text-gray-800">Data Kunjungan</h1><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
     <form role="form" method="post">
     <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Pasien</label>               
                          <select name="id_pasien" class="form-control" >
                            <option value="<?php echo $row1['id_pasien'] ?>"><?php echo $row1['id_pasien'] ?></option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM pasien");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_pasien'];?>">
                              <?php echo $row['id_pasien'] ?> - <?php echo $row['nama_pasien'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label> Tanggal Kunjungan</label>
          <input type="date" name="tgl_kunjungan" class="form-control border-1 small" value="<?php echo $row1['tgl_kunjungan'] ?>">
        </div>
      </div>
      </div>
      </div>
      <div class="card-footer">
        <a href="./index.php?page=kunjungan" class="btn btn-warning">Kembali</a>
                <button  type="submit" name="submit" class="btn btn-primary ">Simpan</button>
      </div>
      </form>
  </div>
</div>
<?php
    }
}
?>