<h1 class="h3 mb-4 text-gray-800">Detail Data Pemeriksaan</h1>
                <div class="card shadow mb-4">
                    <div class="card-body"> 
                   <?php
             $id_pemeriksaan = $_REQUEST['id_pemeriksaan'];

                $sql = mysqli_query($con, "SELECT pasien.nama_pasien,pemeriksaan.keluhan,pemeriksaan.tgl_periksa,dokter.nama_dokter,diagnosis.nama_diagnosis,lab.nama_lab,petugas.nama_petugas,tindakan.nama_tindakan,obat.nama_obat,pemeriksaan.jumlah_obat,alkes.nama_alkes,pemeriksaan.jumlah_alkes FROM pasien,pemeriksaan,dokter,petugas,lab,diagnosis,tindakan,obat,alkes WHERE pasien.id_pasien=pemeriksaan.id_pasien and dokter.id_dokter=pemeriksaan.id_dokter and diagnosis.id_diagnosis=pemeriksaan.id_diagnosis and lab.id_lab=pemeriksaan.id_lab and petugas.id_petugas=pemeriksaan.id_petugas AND tindakan.id_tindakan=pemeriksaan.id_tindakan AND obat.id_obat=pemeriksaan.id_obat AND alkes.id_alkes=pemeriksaan.id_alkes and id_pemeriksaan='$id_pemeriksaan'");
                while($row = mysqli_fetch_array($sql)){
            ?>
                                        <table width="1000px">
                                          <tr>
                                          <td>Nama Pasien</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_pasien']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Keluhan</td>
                                          <td>:&nbsp&nbsp<?php echo $row['keluhan']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Tanggal Periksa</td>
                                          <td>:&nbsp&nbsp<?php echo $row['tgl_periksa']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Nama Dokter</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_dokter']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Diagnosis</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_diagnosis']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Lab</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_lab']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Nama Petugas</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_petugas']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Tindakan</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_tindakan']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Nama Obat</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_obat']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Jumlah Obat</td>
                                          <td>:&nbsp&nbsp<?php echo $row['jumlah_obat']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Nama Alat Kesehatan</td>
                                          <td>:&nbsp&nbsp<?php echo $row['nama_alkes']; ?></td>
                                          </tr>
                                          <tr>
                                          <td>Jumlah Alat Kesehatan</td>
                                          <td>:&nbsp&nbsp<?php echo $row['jumlah_alkes']; ?></td>
                                          </tr>
                                          </table>
            <?php
            }
            ?>
                        </div>
                         <div class="card-footer">
                       <a href="./index.php?page=pemeriksaan" class="btn btn-warning">Kembali</a>
                    </div>
                    </div>