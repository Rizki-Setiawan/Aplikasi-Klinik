 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'petugas_baru.php';
                break;
            case 'edit':
                include 'petugas_edit.php';
                break;
            case 'hapus':
                include 'petugas_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Petugas</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=petugas&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Petugas</th>
                                  <th>Tanggal Lahir</th>                                            
                                  <th>Jenis Kelamin</th>
                                  <th>Alamat</th>
                                  <th>Tanggal Masuk</th>
                                  <th>Tarif Petugas</th>
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT *from petugas");
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
                                 <td>'.$row['nama_petugas'].'</td>
                                 <td>'.$row['tgl_lahir'].'</td>
                                 <td>'.$row['jk'].'</td>                                
                                 <td>'.$row['alamat'].'</td>
                                 <td>'.$row['tgl_masuk'].'</td>
                                 <td>'.$row['tarif_petugas'].'</td>

                                 <td>        
                                 <a href="?page=petugas&aksi=edit&id_petugas='.$row['id_petugas'].'" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen"></i></a>
                                 <a href="?page=petugas&aksi=hapus&submit=yes&id_petugas='.$row['id_petugas'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             