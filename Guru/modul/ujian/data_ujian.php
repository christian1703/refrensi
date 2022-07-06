<div class="content-wrapper">
<h4>
 <b>Ujian</b>
<small class="text-muted">/
Data Ujian
</small>
</h4>
   <div class="row purchace-popup">
                <div class="col-md-12 col-xs-12">
                  <span class="d-flex alifn-items-center">
                 <a class="btn btn-dark" data-toggle="modal" data-target="#addUjian"> <i class="fa fa-plus"></i> Add Ujian</a>
                  </span>
                </div>
              </div>
<div class="row">

	<div class="col-md-12 col-xs-12">

  <div class="" role="">
  </div>

               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Ujian</h4>
                   <p class="card-description">

                  </p>
                    
                  <div class="table-responsive">
                  <table class="table table-striped table-hover table-condensed" id="data">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Mata Pelajaran</th>
                        <th>Jenis Soal</th>
                        <th>Type Soal</th>
                        <th>Tgl Ujian</th>
                        <th>Soal</th>
                        <th>Status Ujian</th>
						<th>Pilih Kelas Ujian</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no=1;
                    $sqlrole = mysqli_query($con,"SELECT * FROM ujian
                    INNER JOIN tb_jenisujian ON ujian.id_jenis=tb_jenisujian.id_jenis
                    INNER JOIN tb_master_mapel ON ujian.id_mapel=tb_master_mapel.id_mapel
                    INNER JOIN tb_master_semester ON ujian.id_semester=tb_master_semester.id_semester
                    WHERE ujian.id_guru='$sesi' ORDER BY id_ujian DESC");
                    foreach ($sqlrole as $row) { ?>       

                      <tr>
                      
                        <td><?=$no++; ?>.</td>
                        <td><?=$row['mapel']; ?> </td>
                        <td><a href="?page=ujian&act=soal&id=<?=$row['id_ujian']; ?>"><b class="text-primary"> <em>OBJEKTIF</em></b></a></td>
                        <td><?=$row['acak']; ?></td>
                        <td><b><?=date('d-F-Y',strtotime($row['tanggal'])); ?></b></td>
                        <td> 
                          <?php $jmlSoal = mysqli_num_rows(mysqli_query($con,"SELECT * FROM soal WHERE id_ujian='$row[id_ujian]' ")) ?>
                          <a href="?page=ujian&act=soal&id=<?=$row['id_ujian']; ?>" class="btn btn-primary btn-sm text-white">Buat Soal  ( <b><?=$jmlSoal; ?></b> )</a>
                      </td>
                           <td>
                            <?php 
                                $klsu= mysqli_query($con,"SELECT * FROM kelas_ujian WHERE id_ujian='$row[id_ujian]' AND aktif='Y' ");
                                 $jml = mysqli_num_rows($klsu);
                                  if ($jml >0) {
                                    ?>
                                    <a data-toggle="modal" data-target="#tutup<?=$row['id_ujian']; ?>" class="btn btn-success btn-sm text-white"><i class="fa fa-check-square-o"></i> Aktif </a>
                                    <a href="?page=ujian&act=status&id=<?=$row['id_ujian'] ?>" class="btn btn-warning btn-sm text-black"><i class="fa fa-eye text-black"></i></a>
                                    <div class="modal fade" id="tutup<?=$row['id_ujian']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">
                                            <center>
                                              Apakah Anda Ingin <b>Non Aktifkan</b> Ujian Ini <br> Sekarang ?
                                            </center>
                                          </h4>
                                        </div>
                                        <div class="modal-body">                                    
                                           <center>
                                             <a href="?page=ujian&act=close&ujian=<?php echo $row['id_ujian']; ?>" class="btn btn-dark"><i class="fa fa-check-square-o"></i> Ya</a>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close-o"></i> Tidak</button>
                                           </center>
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>

                                    <?php
                                  }else{
                                    ?>
                                    <a data-toggle="modal" data-target="#Aktif<?=$row['id_ujian']; ?>" class="btn btn-danger btn-sm text-white"><i class="fa fa-window-close-o"></i> Tutup </a> 
                                  <div class="modal fade" id="Aktif<?=$row['id_ujian']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">
                                            <center>
                                              Apakah Anda Ingin <b>Mengaktifkan</b> Ujian Ini Sekarang ?
                                            </center>
                                          </h4>
                                        </div>
                                        <div class="modal-body">                                    
                                           <center>
                                             <a href="?page=ujian&act=active&ujian=<?php echo $row['id_ujian']; ?>" class="btn btn-dark"><i class="fa fa-check-square-o"></i> Ya</a>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close-o"></i> Tidak</button>
                                           </center>
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>
                                    <?php
                                  }                               
                             ?> 
                        </td>
						
						<td><a data-toggle="modal" data-target="#kelasUjian<?=$row['id_ujian']; ?>" class="btn btn-dark btn-sm text-warning"><i class="fa fa-graduation-cap"></i> Pilih Kelas </a></td>
                        <td>
                            <div class="modal fade" id="kelasUjian<?=$row['id_ujian']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="overflow:scroll;height=600px;">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">PENGATURAN KELAS UJIAN</h4>
                                  </div>
                                   <form  method=POST enctype='multipart/form-data' action=?page=proses>
                                  <div class="modal-body">                                       
                                <input type="hidden" name="id" value="<?=$row[id_ujian]; ?>">
                                <p>
                                      <h4><b>KELAS TERSEDIA</b></h4>
                                    </p>
                                  <table class='table'>
                                  <thead>
                                  <tr>
                                    <th>Nama Kelas & Jurusan</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                <tbody>
                                  <?php
                                  $kelasguru = mysqli_query($con,"SELECT * FROM tb_roleguru
                                  INNER JOIN tb_master_kelas ON tb_roleguru.id_kelas=tb_master_kelas.id_kelas
                                  INNER JOIN tb_master_jurusan ON tb_roleguru.id_jurusan=tb_master_jurusan.id_jurusan
                                  WHERE tb_roleguru.id_guru='$sesi' GROUP BY tb_roleguru.id_jurusan,tb_roleguru.id_kelas");
                                  foreach ($kelasguru as $kg) { ?>
                                  <tr>
                                    <td>

                                      <label class="form-check-label">
                                    <input type="checkbox" value="<?=$kg['id_kelas']; ?>" name="kelas[]">
                                    KELAS <?=$kg['kelas']; ?>
                                    </label>

                                    </td>
                                    <td>
                                      <a href="?page=ujian&act=addkelasujian&ujian=<?=$row['id_ujian']; ?>&kelas=<?=$kg['id_kelas']; ?>&jurusan=<?=$kg['id_jurusan']; ?>" class="btn btn-info btn-xs">Pilih</a>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                                <tr>
                                  <td colspan="2">
                                  <button name="kelasujianSave" type="submit" class="btn btn-primary btn-xs">Save</button>
                                  </td>
                                </tr> 
                                  </table>

                                    <p>
                                      <h4><b>KELAS TERPILIH</b></h4>
                                    </p>
                                  <table class="table">
                                  <thead>
                                  <tr>
                                    <th>Nama Kelas & Jurusan</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $klsujian = mysqli_query($con,"SELECT * FROM kelas_ujian
                                    INNER JOIN tb_master_kelas ON kelas_ujian.id_kelas=tb_master_kelas.id_kelas
                                    INNER JOIN tb_master_jurusan ON kelas_ujian.id_jurusan=tb_master_jurusan.id_jurusan
                                    WHERE id_ujian='$row[id_ujian]' ");
                                    foreach ($klsujian as $ku) { ?>
                                    <tr>
                                      <td> <?=$ku['kelas']; ?>-<?=$ku['jurusan']; ?> </td>
                                      <td> 
                                        <a href="?page=ujian&act=delkelas&id=<?=$ku['id_klsujian']; ?>" class="btn btn-danger btn-xs">Hapus</a>

                                      </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>

                                  </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   
                                  </div>
                                    </form>
                                </div>
                              </div>
                            </div>


                        <a href="?page=ujian&act=ujianedit&id=<?=$row['id_ujian']; ?>" class="btn btn-dark btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                          <a href="?page=ujian&act=ujiandel&id=<?=$row['id_ujian']; ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-dark btn-sm text-danger"><i class="fa fa-trash"></i> Del </a>
                        </td>
                      </tr>
                    <?php } ?>
                   </tbody>
                 </table>
                  </div>
               </div>
             </div>
</div>
</div>
</div>
<div class="modal fade" id="addUjian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <center>
            Silahkan Pilih Jenis Soal Berikut ini !
          </center>
        </h4>
      </div>
      <div class="modal-body">
       <center>
         <a href="?page=ujian&act=add" class="btn btn-dark btn-lg"><i class="fa fa-check-square-o"></i> OBJEKTIF</a>
       </center>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>