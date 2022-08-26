 
<?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'rawat_inap_baru.php';
                break;
            case 'edit':
                include 'rawat_inap_edit.php';
                break;
            case 'hapus':
                include 'rawat_inap_hapus.php';
                break;
            
        }
    } else {

        echo  '
                <h1 class="h3 mb-4 text-gray-800">Data Rawat Inap</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                    <a href="?page=rawat_inap&aksi=baru" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a><br><br>    
                        <div class="col-md-12">  
                        <div class="table-responsive">                      
                              <table class="table table-bordered js-exportable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Pasien</th>
                                  <th>Kamar</th> 
                                  <th>Lama Menginap</th>                                            
                                  <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT rawat_inap.id_rawat_inap,pasien.nama_pasien,kamar.nama_kamar,rawat_inap.lama_menginap from pasien,kamar,rawat_inap where pasien.id_pasien=rawat_inap.id_pasien and kamar.id_kamar=rawat_inap.id_kamar");
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
                                 <td>'.$row['nama_kamar'].'</td>
                                  <td>'.$row['lama_menginap'].' Malam </td>

                                 <td>       
                                 <a href="?page=rawat_inap&aksi=hapus&submit=yes&id_rawat_inap='.$row['id_rawat_inap'].'" onclick="return konfirmasi()" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i> </a>
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
             