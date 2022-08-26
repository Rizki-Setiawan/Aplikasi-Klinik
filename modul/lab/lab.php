 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'lab_baru.php';
                break;
            case 'edit':
                include 'lab_edit.php';
                break;
            case 'hapus':
                include 'lab_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Lab</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=lab&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Lab</th>
                                  <th>Tarif Lab</th>                                            
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT *from lab");
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
                                 <td>'.$row['nama_lab'].'</td>
                                 <td>'.$row['tarif_lab'].'</td>

                                 <td>        
                                 <a href="?page=lab&aksi=edit&id_lab='.$row['id_lab'].'" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen"></i></a>
                                 <a href="?page=lab&aksi=hapus&submit=yes&id_lab='.$row['id_lab'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             