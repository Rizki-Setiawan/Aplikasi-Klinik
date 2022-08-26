 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'edit':
                include 'pembayaran_edit.php';
                break;
            case 'hapus':
                include 'pembayaran_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Pembayaran</h1>
                <div class="card shadow mb-4">
                    <div class="card-body">    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Pasien</th>
                                  <th>Total Bayar</th> 
                                  <th>Tanggal Pembayaran</th> 
                                  <th>Status Pembayaran</th>                                            
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT pembayaran.id_pembayaran,pasien.nama_pasien,pembayaran.total_bayar,pembayaran.tgl_pembayaran,pembayaran.status_pembayaran from pasien,pembayaran where pasien.id_pasien=pembayaran.id_pasien ");
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
                                 <td>'.$row['total_bayar'].'</td>
                                 <td>'.$row['tgl_pembayaran'].'</td>
                                 <td>'.$row['status_pembayaran'].'</td>

                                 <td>        
                                 <a href="?page=pembayaran&aksi=edit&id_pembayaran='.$row['id_pembayaran'].'" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen"></i></a>
                                 <a href="?page=pembayaran&aksi=hapus&submit=yes&id_pembayaran='.$row['id_pembayaran'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             