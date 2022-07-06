<?php 
include 'config/db.php';
$oke = mysqli_query($con,"select * from tb_sekolah where id_sekolah='1'");
$oke1 = mysqli_fetch_array($oke);
 ?>
<div class="content-wrapper">
  <h3> <b>Dashboard</b> <small class="text-muted">/Admin</small>
  </h3>
  <hr>
  <div class="row">

    <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <center>
              <h2>
               PANEL ADMIN APLIKASI <strong>PintarBersama</strong> <br>
              <?php echo $oke1['nama_sekolah'];?></h2>
            </center>

         </div>
      </div>                  
    </div>
      <div class="mt-3">
      <?php
        $sqlg = mysqli_query($con,"SELECT * FROM tb_guru WHERE status='N' ORDER BY id_guru DESC"); ?>
        <?php        
        foreach ($sqlg as $d) { ?> 
        <?php 
        if ($d['confirm']=='Yes') {
        }else{
          ?>
          <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong><?=$d['nama_guru'] ?>!</strong> Membuat Akun <em><a href="" data-toggle="modal" data-target="#guru<?=$d['id_guru'] ?>"> Konfirmasi</a></em>
          </div>
                            <div class="modal fade" id="guru<?=$d['id_guru'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"><h4 class="modal-title"> Informasi Pendaftar </h4></div>
                                <center><h4>GURU</h4></center>
                                <table class="table">
                                <tr>

                                  </tr>
                                  <tr>
                                    <td>Nip/Nuptk</td>
                                    <td>:</td>
                                    <td><?=$d['nik']; ?></td>
                                  </tr>
                                   <tr>
                                    <td>Nama Guru</td>
                                    <td>:</td>
                                    <td><?=$d['nama_guru']; ?></td>
                                  </tr>
                                   <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?=$d['email']; ?></td>
                                  </tr>
                                </table>
                                    
                                    <div class="modal-footer">        
                                    <a href="?page=guru&act=unconfirm&id=<?=$d['id_guru']; ?>" class="btn btn-danger">Tolak</a>
                                    <a href="?page=guru&act=confirm&id=<?=$d['id_guru']; ?>" class="btn btn-success"> Setujui</a>                                  
                                    </div>
                                </div>         
                        </div>
                    </div>
          <?php
        }
         ?>          
        <?php } ?>
          <?php 
        $sqls = mysqli_query($con,"SELECT * FROM tb_siswa

          INNER JOIN tb_master_kelas ON tb_siswa.id_kelas=tb_master_kelas.id_kelas
          INNER JOIN tb_master_jurusan ON tb_siswa.id_jurusan=tb_master_jurusan.id_jurusan

         WHERE tb_siswa.aktif='N' ORDER BY tb_siswa.id_siswa DESC");
        foreach ($sqls as $d) { ?>
         <?php
         if ($d['confirm']=='Yes') {
         }else{
          ?>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong><?=$d['nama_siswa'] ?>!</strong> Membuat Akun <em><a href="" data-toggle="modal" data-target="#siswa<?=$d['id_siswa'] ?>"> Konfirmasi</a></em>
        </div>
               <div class="modal fade" id="siswa<?=$d['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"><h4 class="modal-title"> Informasi Pendaftar </h4></div>
                                <center><h4>SISWA</h4></center>
                                <table class="table">
                                <tr>
                                  </tr>
                                  <tr>
                                    <td>Nis</td>
                                    <td>:</td>
                                    <td><?=$d['nis']; ?></td>
                                  </tr>
                                   <tr>
                                    <td>Nama Siswa</td>
                                    <td>:</td>
                                    <td><?=$d['nama_siswa']; ?></td>
                                  </tr>
                                   <tr>
                                    <td>Kelas/Jurusan</td>
                                    <td>:</td>
                                    <td><?=$d['kelas']; ?>/<?=$d['jurusan']; ?></td>
                                  </tr>
                                </table>
                                    
                                    <div class="modal-footer">        
                                    <a href="?page=siswa&act=unconfirm&id=<?=$d['id_siswa']; ?>" class="btn btn-danger">Tolak</a>
                                    <a href="?page=siswa&act=confirm&id=<?=$d['id_siswa']; ?>" class="btn btn-success"> Setujui</a>                                  
                                    </div>
                                
                                </div>         
                        </div>
                    </div>
          <?php
         }
          ?>
        <?php } ?>
      </div>               
    </div>
  </div>
  </div>