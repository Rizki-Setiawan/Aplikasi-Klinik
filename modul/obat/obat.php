 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'obat_baru.php';
                break;
            case 'edit':
                include 'obat_edit.php';
                break;
            case 'hapus':
                include 'obat_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Obat</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=obat&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Obat</th>
                                  <th>Jenis Obat</th>                                            
                                  <th>Harga Jual</th>
                                  <th>Stock Obat</th>
                                  <th>Tanggal Beli</th>
                                  <th>Tanggal Kedaluwarsa</th>
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT *from obat");
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
                                 <td>'.$row['nama_obat'].'</td>
                                 <td>'.$row['jenis_obat'].'</td>
                                 <td>'.$row['harga_jual'].'</td>                                
                                 <td>'.$row['stock_obat'].'</td>
                                 <td>'.$row['tgl_beli'].'</td>
                                 <td>'.$row['tgl_kedaluwarsa'].'</td>

                                 <td>        
                                 <a href="?page=obat&aksi=edit&id_obat='.$row['id_obat'].'" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen"></i></a>
                                 <a href="?page=obat&aksi=hapus&submit=yes&id_obat='.$row['id_obat'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             