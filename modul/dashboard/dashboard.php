<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pasien</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $sql = mysqli_query($con, "SELECT * FROM pasien");
                        $hasil = mysqli_num_rows($sql);
                        echo $hasil;
                        ?>
                        Orang
                      </div>
                    </div>
                    <a href="index.php?page=pasien">
                    <div class="col-auto">
                      <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>  
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dokter</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $sql = mysqli_query($con, "SELECT * FROM dokter");
                        $hasil2 = mysqli_num_rows($sql);
                        echo $hasil2;
                        ?>
                        Orang
                      </div>
                    </div>
                    <a href="index.php?page=dokter">
                    <div class="col-auto">
                      <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>  
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Petugas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $sql = mysqli_query($con, "SELECT * FROM petugas");
                        $hasil4 = mysqli_num_rows($sql);
                        echo $hasil4;
                        ?>
                        Orang
                      </div>
                    </div>
                    <a href="index.php?page=petugas">
                    <div class="col-auto">
                      <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Kamar Kosong</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $sql = mysqli_query($con, "SELECT * FROM kamar WHERE NOT EXISTS (SELECT * FROM rawat_inap WHERE kamar.id_kamar=rawat_inap.id_kamar)");
                        $hasil3 = mysqli_num_rows($sql);
                        echo $hasil3;
                        ?>
                        Kamar
                      </div>
                    </div>
                    <a href="index.php?page=rawat_inap">
                    <div class="col-auto">
                      <i class="fas fa-person-booth fa-2x text-gray-300"></i>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-md-12">
              <div class="card border-bottom-primary shadow h-100 py-2">
              <div class="card-header">
              <h5 class="h5 mb-0 text-gray-1000 text-primary">Data Pasien Terbaru</h5>
              </div>
                <div class="card-body">
                  <table class="table-striped" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                <th>Nama Pasien</th> 
                                <th>Jenis Kelamin</th> 
                                <th>Alamat</th> 
                                <th>Pekerjaan</th>                                            
                                </tr>
                                </thead>
                                <tbody> <?php
                            $sql = mysqli_query($con, "SELECT nama_pasien,jk,alamat,pekerjaan from pasien order by id_pasien desc limit 4");
                            if(mysqli_num_rows($sql) > 0){
                              $no=0;

                                 while($row = mysqli_fetch_array($sql)){
                                    $no++;
                                echo '  
                                 <tr>
                                 <td>'.$row['nama_pasien'].'</td>
                                 <td>'.$row['jk'].'</td>
                                 <td>'.$row['alamat'].'</td>
                                 <td>'.$row['pekerjaan'].'</td>
                                 </tr>
                                 ';
                                        }
                                } 
                            echo '                                                            
                                    </tbody>
                                 </table>
                                 ';
                               
                                 ?>
                </div>
              </div>
            </div>  
</div>
