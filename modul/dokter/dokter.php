 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'dokter_baru.php';
                break;
            case 'edit':
                include 'dokter_edit.php';
                break;
            case 'hapus':
                include 'dokter_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Dokter</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=dokter&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Dokter</th>
                                  <th>Tanggal Lahir</th>                                            
                                  <th>Jenis Kelamin</th>
                                  <th>Alamat</th>
                                  <th>Tanggal Masuk</th>
                                  <th>Tarif Dokter</th>
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT *from dokter");
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
                                 <td>'.$row['nama_dokter'].'</td>
                                 <td>'.$row['tgl_lahir'].'</td>
                                 <td>'.$row['jk'].'</td>                                
                                 <td>'.$row['alamat'].'</td>
                                 <td>'.$row['tgl_masuk'].'</td>
                                 <td>'.$row['tarif_dokter'].'</td>

                                 <td>        
                                 <a href="?page=dokter&aksi=edit&id_dokter='.$row['id_dokter'].'" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen"></i></a>
                                 <a href="?page=dokter&aksi=hapus&submit=yes&id_dokter='.$row['id_dokter'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             