 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'pengguna_baru.php';
                break;
            case 'hapus':
                include 'pengguna_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Pengguna</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=pengguna&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Pengguna</th>
                                  <th>Email</th>
                                  <th>Level</th>                                            
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT *from login");
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
                                 <td>'.$row['username'].'</td>
                                 <td>'.$row['email'].'</td>
                                 <td>'.$row['level'].'</td>

                                 <td>        
                                 <a href="?page=pengguna&aksi=hapus&submit=yes&id_user='.$row['id_user'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             