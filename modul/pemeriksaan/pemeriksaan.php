 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'pemeriksaan_baru.php';
                break;
            case 'hapus':
                include 'pemeriksaan_hapus.php';
                break;
            case 'detail':
                include 'pemeriksaan_detail.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Pemeriksaan</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=pemeriksaan&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Pasien</th>
                                  <th>Tanggal Periksa</th>
                                  <th>Nama Dokter</th>   
                                  <th>Keluhan</th>                                            
                                  <th>Diagnosis</th>
                                  <th>Tindakan</th>
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT pemeriksaan.id_pemeriksaan,pasien.nama_pasien,pemeriksaan.tgl_periksa,dokter.nama_dokter,diagnosis.nama_diagnosis, tindakan.nama_tindakan,pemeriksaan.keluhan from pasien,pemeriksaan,dokter,diagnosis,tindakan where pasien.id_pasien=pemeriksaan.id_pasien and dokter.id_dokter=pemeriksaan.id_dokter and diagnosis.id_diagnosis=pemeriksaan.id_diagnosis and tindakan.id_tindakan=pemeriksaan.id_tindakan");
                            if(mysqli_num_rows($sql) > 0){
                                $no = 0;

                                 while($row = mysqli_fetch_array($sql)){
                                    $no++;
                                echo '  
                                 <script type="text/javascript" language="JavaScript">
                                    function konfirmasi(){
                                        tanya = confirm("Anda yakin akan menghapus data ini?");
                                        if (tanya == true) return true;
                                        else return false;
                                    }
                                </script>
                                 <tr>
                                 <td>'.$no.'</td>
                                 <td>'.$row['nama_pasien'].'</td>
                                 <td>'.$row['tgl_periksa'].'</td>
                                 <td>'.$row['nama_dokter'].'</td> 
                                 <td>'.$row['keluhan'].'</td>                               
                                 <td>'.$row['nama_diagnosis'].'</td>
                                 <td>'.$row['nama_tindakan'].'</td>

                                 <td>    
                                 <a href="?page=pemeriksaan&aksi=detail&id_pemeriksaan='.$row['id_pemeriksaan'].'" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-search"></i></a>       
                                 <a href="?page=pemeriksaan&aksi=hapus&submit=yes&id_pemeriksaan='.$row['id_pemeriksaan'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
                                 </td>';
                                        }
                                } 
                            echo '                                                            
                                    </tbody>
                                 </table>
                                </div>
                            </div>
                        </div>
                    </div> ';
    }
?>
             