 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'rawat_jalan_baru.php';
                break;
            case 'hapus':
                include 'rawat_jalan_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Rawat Jalan</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=rawat_jalan&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Pasien</th>                                          
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT rawat_jalan.id_rawat_jalan,pasien.nama_pasien from pasien,rawat_jalan where pasien.id_pasien=rawat_jalan.id_pasien");
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
                                 <td>        
                                 <a href="?page=rawat_jalan&aksi=hapus&submit=yes&id_rawat_jalan='.$row['id_rawat_jalan'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             