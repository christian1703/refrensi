<script type="text/javascript" src="pesan.js"></script>
<?php
$mapel = mysqli_num_rows(mysqli_query($con,"SELECT id_mapel FROM tb_roleguru WHERE id_guru='$sesi' "));
$perangkat = mysqli_num_rows(mysqli_query($con,"SELECT id_tugas FROM tb_tugas WHERE id_guru='$sesi' "));
$materi = mysqli_num_rows(mysqli_query($con,"SELECT id_materi FROM tb_materi
INNER JOIN tb_roleguru ON tb_materi.id_roleguru=tb_roleguru.id_roleguru
WHERE tb_roleguru.id_guru='$sesi' "));
$objektif = mysqli_num_rows(mysqli_query($con,"SELECT id_ujian FROM ujian WHERE id_guru='$sesi' "));
$essay = mysqli_num_rows(mysqli_query($con,"SELECT id_ujianessay FROM ujian_essay WHERE id_guru='$sesi' "));
$ujian = $objektif+$essay;

 ?>
<div class="content-wrapper">
<h3>
 <b>Dashboard</b>
<small class="text-muted">/
Guru
</small>
</h3>
<hr>
<div class="row">
  <div class="col-md-9 col-xs-12">

    <div class="row">

      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #00BCD4;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-globe icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold">Jumlah Pelajaran</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0"><?=$mapel; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=mapel" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>

      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #9C27B0;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-file-text-o icon-lg text-white"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold text-white">Jumlah Tugas</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0 text-white"><?=$perangkat; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=tugas&act=view
" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>


      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #FF5722;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-file-text-o icon-lg text-white"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold text-white">Jumlah Materi</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0 text-white"><?=$materi; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=materi" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>

      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #212121;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-pencil icon-lg text-white"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold text-white">Jumlah Ujian</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0 text-white"><?=$ujian; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=ujian" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>



    </div>
    <div class="row">
     <?php 
	 $tgl=date('Y-m-d');
     $mtri = mysqli_query($con,"SELECT * FROM tb_materi 

      INNER JOIN tb_roleguru ON tb_materi.id_roleguru=tb_roleguru.id_roleguru

     INNER JOIN tb_master_kelas ON tb_roleguru.id_kelas=tb_master_kelas.id_kelas

     INNER JOIN tb_master_mapel ON tb_roleguru.id_mapel=tb_master_mapel.id_mapel

     INNER JOIN tb_master_jurusan ON tb_roleguru.id_jurusan=tb_master_jurusan.id_jurusan
     
     WHERE tb_roleguru.id_guru='$sesi' AND tb_materi.public='Y' AND tb_materi.tgl_entry='$tgl'
     ");
     foreach ($mtri as $mtr) { ?>
      <div class="col-md-10">
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Info!</strong> Anda telah Membagikan Materi <b><?=$mtr['mapel'] ?></b> Untuk Kelas <b><?=$mtr['kelas'] ?>-<?=$mtr['jurusan'] ?></b>
    
            <?php
            if ($mtr['public']=='Y') {
            echo "<a href='?page=materi&act=activate&id=$mtr[id_materi]&status=$mtr[public]'>Klik disini</a>";
            }else{
            echo "<a href='?page=materi&act=activate&id=$mtr[id_materi]&status=$mtr[public]'>Klik disini</a>";
            }

            ?>

          untuk Membatalkan !
        </div>
      </div>
     <?php
     }
      ?>
    </div>  
    </div>
    <div class="col-md-3 col-xs-12 wrap" style="background-color:#F5F5F5;border-radius:20px; overflow:scroll;height:600px;">
    <div class="mt-3">
    <h4><b><i class="fa fa-wechat text-success"></i></b> <b class="text-success">Chat</b> Box</h4>

    <hr>
<?php 
$roleGuru = mysqli_query($con,"SELECT * FROM tb_roleguru WHERE id_guru='$sesi' GROUP BY id_kelas") or die(mysqli_error($con));
foreach ($roleGuru as $rg) { ?>

<?php
 $query_daftar_pesan = mysqli_query($con, "SELECT P.*, M.nis, M.nama_siswa,M.foto,M.id_kelas,M.id_jurusan
  FROM pesan P, tb_siswa M WHERE P.id_pengirim=M.nis AND P.id_penerima='$data[nik]' AND P.id_kelas='$rg[id_kelas]' AND P.id_jurusan='$rg[id_jurusan]' ORDER BY P.id_pesan DESC");

  while ($daftar_pesan=mysqli_fetch_array($query_daftar_pesan)) {
$kelas = mysqli_query($con,"SELECT kelas FROM tb_master_kelas WHERE id_kelas='$daftar_pesan[id_kelas]' ");
$jurusan = mysqli_query($con,"SELECT jurusan FROM tb_master_jurusan WHERE id_jurusan='$daftar_pesan[id_jurusan]' ");
foreach ($kelas as $kls)
foreach ($jurusan as $jrs)

    if($daftar_pesan['sudah_dibaca']=="belum"){

?>

<div data-toggle="modal" data-target="#Apply<?php echo $daftar_pesan['id_pengirim']; ?>" class="alert alert-warning alert-dismissible" role="alert">
<a href="?page=chat&act=del&id=<?php echo $daftar_pesan['id_pesan']; ?>" class="close"><i class="fa fa-trash text-danger" style="font-size: 16px;"></i></a>
<strong><?php echo $daftar_pesan['nama_siswa']; ?></strong>  Kelas (<?php echo $kls['kelas']; ?>-<?php echo $jrs['jurusan']; ?>) <em style="font-size: 10px;"><?php echo date('d-m-Y',strtotime($daftar_pesan['tanggal'])); ?></em> <br><?php echo $daftar_pesan['isi_pesan']; ?>

</div> 
<p>
  <a href="" class="btn btn-light text-success" data-toggle="modal" data-target="#Apply<?php echo $daftar_pesan['id_pengirim']; ?>"><i class="fa fa-angle-double-right"></i> Balas</a>
</p>
<div class="modal fade" id="Apply<?php echo $daftar_pesan['id_pengirim']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"> <b><i class="fa fa-wechat"></i> Balas Pesan</b> </h4></div>
            <form action="" method="post">
                <div class="modal-body"> 
                  <p>
                    <img src="../pelengkap/images/img_Siswa/<?php echo $daftar_pesan['foto']; ?>"style="width: 50px;height: 50px;border-radius: 100%;"> <strong><?php echo $daftar_pesan['nama_siswa']; ?></strong> 
                  </p>
                  <div style="background-color: #fff;padding: 6px;border-radius: 10px;">
                    <p><?php echo $daftar_pesan['isi_pesan']; ?></p>
                  </div>
                  <p></p>
                  <div class="form-group">
                    <input type="hidden" name="pengirim" value="<?php echo $data['nik']; ?>">
                    <input type="hidden" name="status" value="<?php echo $daftar_pesan['id_pesan']; ?>">
                    <input type="hidden" name="penerima" value="<?php echo $daftar_pesan['nis']; ?>">
                    <input type="hidden" name="kelas" value="<?php echo $daftar_pesan['id_kelas']; ?>">
                    <input type="hidden" name="jurusan" value="<?php echo $daftar_pesan['id_jurusan']; ?>">
                    <textarea name="isi_pesan" id="ckeditor" class="form-control" rows="5">Tulis Pesan</textarea>
                  </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button name="sendMassage" type="submit" class="btn btn-info"><i class="fa fa-send"></i> Kirim Pesan</button>
                </div>
                </form>
                  <?php 
                  if (isset($_POST['sendMassage'])) {
                  $tanggal = date('Y-m-d');
                  $send = mysqli_query($con, "INSERT INTO pesan 
                  VALUES('null','$_POST[pengirim]','$_POST[penerima]','$tanggal','Re: $_POST[isi_pesan]','belum','$_POST[kelas]','$_POST[jurusan]')");
                  if ($send) {
                    $ubah = mysqli_query($con,"UPDATE pesan SET sudah_dibaca='sudah' WHERE id_pesan='$_POST[status]' ");
                    if ($ubah) {
                        echo "
                  <script> 
                  alert('Terkirim !');
                  window.location='index.php';
                  </script>"; 
                    }
                                       
                  }                   
                  }              

                  ?>
               
            </div>         
    </div>
</div>

<?php } 
    else if($daftar_pesan['sudah_dibaca']=="sudah"){
?>
<div class="alert alert-default alert-dismissible" role="alert" style="border-radius: 10px;background: #ECEFF1;color: black;">
   <a href="?page=chat&act=del&id=<?php echo $daftar_pesan['id_pesan']; ?>" class="close"><i class="fa fa-trash text-danger" style="font-size: 16px;"></i></a>
<strong><?php echo $daftar_pesan['nama_siswa']; ?></strong> Kelas (<?php echo $kls['kelas']; ?>-<?php echo $jrs['jurusan']; ?>) <em><?php echo date('d F Y',strtotime($daftar_pesan['tanggal'])); ?></em> <br><?php echo $daftar_pesan['isi_pesan']; ?>
</div> 


<?php 
    } 
  }
?>
<?php } ?>
<form action="" method="post">
  <div class="form-group">
   
    <select class="form-control" name="id_roleguru" onchange="cek_database()" id="id_roleguru" style="font-weight: bold;font-size: 16px; border-radius: 10px;" required>
    <option>Kirim Ke</option>
    <?php
    $sqlMapel=mysqli_query($con, "SELECT * FROM tb_roleguru
            INNER JOIN tb_master_kelas ON tb_roleguru.id_kelas=tb_master_kelas.id_kelas
            INNER JOIN tb_master_jurusan ON tb_roleguru.id_jurusan=tb_master_jurusan.id_jurusan
            WHERE tb_roleguru.id_guru='$sesi' GROUP BY tb_roleguru.id_kelas");
    while($mapel=mysqli_fetch_array($sqlMapel)){
    echo "<option value='$mapel[id_roleguru]'>Kelas $mapel[kelas] - $mapel[jurusan]</option>";
    }
    ?>
    </select>
    <input type="hidden" name="idkelas" id="id_kelas">
     <input type="hidden" name="idjurusan" id="id_jurusan">
  </div>
   <div class="form-group">
    <input type="hidden" name="idpengirim" value="<?php echo $data['nik']; ?>">
    <textarea name="pesan" class="form-control" rows="5" id="ckeditor1" placeholder="Tulis Pesan"></textarea>
  </div>
    <div class="form-group">
      <button name="sendMassageMassal" type="submit" class="btn btn-light"><i class="fa fa-send"></i> Kirim</button>
    </div>

            </form>
             <?php 
                  if (isset($_POST['sendMassageMassal'])) {
                  $tanggal = date('Y-m-d');
                  $send = mysqli_query($con, "INSERT INTO pesan 
                  VALUES('null','$_POST[idpengirim]','$_POST[penerima]','$tanggal','$_POST[pesan]','belum','$_POST[idkelas]','$_POST[idjurusan]')");
                  if ($send) {
                  echo "
                  <script> 
                  alert('Terkirim !');
                  window.location='index.php';
                  </script>";                        
                  }                   
                  }              
                  ?>
                      <?php 
                      $sw = mysqli_query($con,"SELECT * FROM tb_siswa
                        INNER JOIN tb_master_kelas ON tb_siswa.id_kelas=tb_master_kelas.id_kelas
                        INNER JOIN tb_master_jurusan ON tb_siswa.id_jurusan=tb_master_jurusan.id_jurusan
                       WHERE tb_siswa.id_kelas='$role[id_kelas]' AND tb_siswa.id_jurusan='$role[id_jurusan]' ");
                      foreach ($sw as $s) { ?>
                 

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