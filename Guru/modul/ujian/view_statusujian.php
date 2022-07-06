<div class="content-wrapper">
<h4> <b>Ujian</b> <small class="text-muted">/ STATUS UJIAN SISWA</small>
</h4>
<hr>
<?php
$ujian = mysqli_query($con,"SELECT * FROM ujian
INNER JOIN tb_master_mapel ON ujian.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_jenisujian ON ujian.id_jenis=tb_jenisujian.id_jenis
INNER JOIN tb_master_semester ON ujian.id_semester=tb_master_semester.id_semester
WHERE ujian.id_guru='$data[id_guru]' AND ujian.id_ujian='$_GET[id]' "); 
$jm= mysqli_num_rows($ujian);  
foreach ($ujian as $d) 

$kelas = mysqli_query($con,"SELECT * FROM kelas_ujian
INNER JOIN tb_master_kelas ON kelas_ujian.id_kelas=tb_master_kelas.id_kelas
INNER JOIN tb_master_jurusan ON kelas_ujian.id_jurusan=tb_master_jurusan.id_jurusan
WHERE kelas_ujian.id_ujian='$_GET[id]' AND kelas_ujian.aktif='Y'  ");
foreach ($kelas as $kls)
?>

<div class="row purchace-popup">
            <div class="col-12">
              <span class="d-flex alifn-items-center">
              <table class="table table-striped table-hover">
              <tr>
              <th colspan="5">DETAIL UJIAN <b><?=$d['jenis_ujian'] ?></b></th>
              </tr>
              <tr>
              <th>Judul Ujian</th>
              <th>:</th>
              <th><?=$d['judul'] ?></th>
              <th>Semester</th>
              <th>:</th>
              <th><?=$d['semester'] ?></th>
              </tr>  
              <tr>
              <th>Mata Pelajaran</th>
              <th>:</th>
              <th><?=$d['mapel'] ?></th>
              <th>Jumlah Soal</th>
              <th>:</th>
              <th><?=$d['jml_soal'] ?></th>
              </tr>  
              <tr>
              <th>Kelas/Jurusan</th>
              <th>:</th>
              <th>
                <?php
                $nk=1;
                foreach ($kelas as $kls) { ?>
              <b class="badge badge-pill badge-info"><?=$nk++; ?>.<?=$kls['kelas'] ?> - <?=$kls['jurusan'] ?></b> <br> <br>
                <?php }?>
              </th>
              <th>Waktu</th>
              <th>:</th>
              <th><?=$d['waktu'] ?></th>
              </tr>
              
            <tr>
              <th>TANGGAL </th>
              <th>:</th>
              <th><b class="text-danger"><?=date('d-F-Y',strtotime($d['tanggal'])) ?></b></th>
            </tr>    

              </table>
              </span>
              
            </div>
          </div>


<?php
foreach ($kelas as $klsuj) { ?>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body" style="overflow:scroll;height:600px;">
<?=$klsuj['kelas'] ?> -<?=$klsuj['jurusan'] ?>

<h4>DAFTAR SISWA <b><?=$klsuj['kelas'] ?> -<?=$klsuj['jurusan'] ?> </b> MENGIKUTI UJIAN</h4>
        <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        
                        <th>Nama Siswa</th>
                        <th>Kelas</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      $sw = mysqli_query($con,"SELECT * FROM tb_siswa
                        INNER JOIN tb_master_kelas ON tb_siswa.id_kelas=tb_master_kelas.id_kelas
                        INNER JOIN tb_master_jurusan ON tb_siswa.id_jurusan=tb_master_jurusan.id_jurusan
                       WHERE tb_siswa.id_kelas='$klsuj[id_kelas]' AND tb_siswa.id_jurusan='$klsuj[id_jurusan]' ");
                      foreach ($sw as $s) { ?>
                      <tr>
                        <td>
                          <?php echo $no++; ?>.
                        </td>
                        
                        <td><?=$s['nama_siswa']; ?></td>
                        <td><?=$s['kelas']; ?>-<?=$s['jurusan']; ?></td>
                        <td>

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

<?php }?>

<?=$kls['kelas'] ?> -<?=$kls['jurusan'] ?> 
                      <?php 
                      $sw = mysqli_query($con,"SELECT * FROM tb_siswa
                        INNER JOIN tb_master_kelas ON tb_siswa.id_kelas=tb_master_kelas.id_kelas
                        INNER JOIN tb_master_jurusan ON tb_siswa.id_jurusan=tb_master_jurusan.id_jurusan
                       WHERE tb_siswa.id_kelas='$kls[id_kelas]' AND tb_siswa.id_jurusan='$kls[id_jurusan]' ");
                      foreach ($sw as $s) { ?>
                      
                      <?=$s['foto']; ?>
                         <?=$s['nama_siswa']; ?>
                        <?=$s['kelas']; ?>-<?=$s['jurusan']; ?>
                          <?php 
                          if ($s['status']=='off') {
                            ?>
                            <?=$s['status']; ?>
                            <?php
                          }elseif ($s['status']=='Online') {
                            ?>
                             <?=$s['status']; ?>
                            <?php
                          }elseif ($s['status']=='selesai') {
                            ?>
                            <?=$s['status']; ?>
                            <?php
                          }else{
                             ?>
                            <?=$s['status']; ?>
                            <?php
                          }
                           ?>
                    <?php } ?>