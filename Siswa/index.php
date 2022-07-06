<?php
session_start();
include '../config/db.php';

if (@$_SESSION['Siswa']) {
?>
<?php
if (@$_SESSION['Siswa']) {
$sesi = @$_SESSION['Siswa'];
}

$sql = mysqli_query($con,"SELECT * FROM tb_siswa
 WHERE id_siswa = '$sesi'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

$sekolah = mysqli_query($con,"SELECT * FROM tb_sekolah WHERE id_sekolah=1 ");
$apl = mysqli_fetch_array($sekolah);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-learning | <?=$data['nama_siswa']; ?></title>
  <link rel="stylesheet" href="../pelengkap/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../pelengkap/node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../pelengkap/node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../pelengkap/css/style.css">
  <link rel="shortcut icon" href="../pelengkap/images/favicon.png" />
  <link href="../pelengkap/sweetalert/sweetalert.css" rel="stylesheet" />
  <script src="../pelengkap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/jquery/jquery-2.0.2.min.js"></script>
  <script type="text/javascript" src="../pelengkap/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="../pelengkap/css/jquery.dataTables.css">
  <script type="text/javascript" src="js/main.js"></script>
  <link href="css/ujian.css" rel="stylesheet">
  <script type="text/javascript" src="js/sidein_menu.js"></script>
    <script>
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
    </script>

</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color: #1991eb;">
        <a class="navbar-brand brand-logo" href="index.php" style="font-family:Aegyptus;font-weight: bold;font-size: 30px;">
          <img src="../pelengkap/images/<?=$apl['logo'];?>" alt="logo" style="height: 45px;width: 45px;border-radius: 10px;"> <b><?=$apl['textlogo'];?></b>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

          <li class="nav-item" style="width: 400px;">
            <a href="#" style="color: #fff;text-decoration: none;"> <b><?=$apl['nama_sekolah'];?></b></a>
          </li>


        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <?php
            $no=1;
          $sqlmtr = mysqli_query($con,"SELECT * FROM tb_materi

            INNER JOIN tb_roleguru ON tb_materi.id_roleguru=tb_roleguru.id_roleguru

          INNER JOIN tb_master_mapel ON tb_roleguru.id_mapel=tb_master_mapel.id_mapel
          INNER JOIN tb_guru ON tb_roleguru.id_guru=tb_guru.id_guru
          WHERE tb_roleguru.id_kelas='$data[id_kelas]' AND tb_roleguru.id_jurusan='$data[id_jurusan]' GROUP BY tb_roleguru.id_mapel ");
          $jmlh = mysqli_num_rows($sqlmtr);

           ?>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-ring"></i>
              <span class="count"><?=$jmlh ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <a href="?page=materi" class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left"><b><?=$jmlh; ?></b> Mata Pelajaran
                </p>
                <span class="badge badge-pill badge-warning float-right">Lihat Semua</span>
              </a>
                  <?php                
                  foreach ($sqlmtr as $row) { ?> 
                  <a href="?page=materi&act=mapel&ID=<?=$row['id_mapel']; ?>&mp=<?=$row['mapel']; ?>" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                  <div class="preview-icon">
                  <img src="../pelengkap/images/img_Guru/<?=$row['foto']; ?>" alt="logo" style="height:40px;width: 40px;">
                  </div>
                  </div>                
                  <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium"> <?=$row['mapel']; ?></h6>
                  <p class="font-weight-light small-text">
                  <?=$row['nama_guru']; ?>
                  </p>
                  </div>
                  </a>
                    <div class="dropdown-divider"></div>
                  <?php
                  }
                  ?>
            </div>
          </li>

          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" href="?page=profil">              
              <b>My Profile</b>
            </a>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

        
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"><span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?=$data['nama_siswa']; ?></p>
                <p class="designation">Siswa</p>
                <div class="badge badge-teal mx-auto mt-3"><?=$data['status']; ?></div>
              </div>
            </div>
          </li>
          <li class="nav-item">
          	<a class="nav-link" href="index.php"><img class="menu-icon" src="../pelengkap/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">DASHBOARD</span></a>
          </li>

          <li class="nav-item">
          	<a class="nav-link" href="?page=profil"><img class="menu-icon" src="../pelengkap/images/menu_icons/10.png" alt="menu icon"> <span class="menu-title">MY PROFIL</span></a>
          </li>

     
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menuMateri" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="../pelengkap/images/menu_icons/04.png" alt="menu icon"> <span class="menu-title">MATERI</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menuMateri">
              <ul class="nav flex-column sub-menu">
                <?php 
                $semester = mysqli_query($con,"SELECT * FROM tb_master_semester");
                foreach ($semester as $smt) { ?>
                <li class="nav-item">
                  <a class="nav-link" href="?page=materi&act=semester&id=<?=$smt['id_semester']; ?>&semester=<?=$smt['semester']; ?>"><img class="menu-icon" src="../pelengkap/images/menu_icons/04.png" alt="menu icon"><?=$smt['semester']; ?> </a>
              </li>
            <?php } ?>

               <li class="nav-item">
                  <a class="nav-link" href="?page=materi"><img class="menu-icon" src="../pelengkap/images/menu_icons/04.png" alt="menu icon">Semua Materi</a>
              </li>

              </ul>
            </div>
          </li>
               <li class="nav-item">
          <a class="nav-link" href="?page=tugas"><img class="menu-icon" src="../pelengkap/images/menu_icons/04.png" alt="menu icon"> <span class="menu-title">TUGAS </span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menuEvaluasi" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="../pelengkap/images/menu_icons/04.png" alt="menu icon"> <span class="menu-title">UJIAN</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menuEvaluasi">
              <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="?page=ujian" style="font-size: 15px;"><i class="fa fa-info-circle"></i>&nbsp; INFO UJIAN</a>
              </li>
               <li class="nav-item">
                    <a class="nav-link" href="?page=evaluasi&act=nilai" style="font-size: 15px;"><i class="fa fa-file-text"></i>&nbsp; DAFTAR NILAI</a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" href="?page=evaluasi" style="font-size: 15px;"><i class="fa fa-language"></i>&nbsp; DAFTAR SOAL</a>
              </li> 
              </ul>
            </div>
          </li>
          <hr>

          <li class="nav-item purchase-button">
          	<a class="nav-link" href="logout.php?ID=<?php echo $data['id_siswa'] ?>">
          	Keluar</a>
          </li>

        </ul>
      </nav>
      <div class="main-panel">
                <?php
                error_reporting();
                $page = @$_GET['page'];
                $act = @$_GET['act'];
                if ($page=='materi') {
                if ($act=='') {
                    include 'modul/materi/data_materi.php';
                  }elseif ($act=='mapel') {
                   include 'modul/materi/view_mapel.php';
                  }elseif ($act=='semester') {
                    include 'modul/materi/view_semester.php';
                   }
                }elseif ($page=='profil') {
                  if ($act=='') {
                    include 'modul/profil/data_profil.php';
                  }
                }elseif ($page=='evaluasi') {
                   if ($act=='') {
                    include 'modul/evaluasi/data_soal.php';
                  }elseif ($act='nilai') {
                   include 'modul/evaluasi/data_nilai.php';
                  }
                }elseif ($page=='ujian') {
                  if ($act=='') {
                    include 'modul/evaluasi/info_ujian.php';
                  }
                }
                elseif ($page=='chat') {
                  if ($act=='') {
                   include 'chat.php';
                  }elseif ($act=='del') {
                    include 'modul/chat/del.php';
                  }
                }elseif ($page=='tugas') {
                    if ($act=='') {
                     include 'modul/tugas/data_tugas.php';
                    }elseif ($act=='upload') {
                      include 'modul/tugas/upload_tugas.php';
                    }
                }elseif ($page=='proses') {
                 include 'modul/models.php';
				 include '../media/story.html';
                }elseif ($page=='') {
                  ?> 
                <div class="content-wrapper">
                <h3> <b>Dashboard</b> <small class="text-muted">/Siswa</small>
                </h3>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                      <div class="card-body">
                        
                        <div id="isi"> </div>  

                        </div>
                        </div>                  
                  </div>
                </div>
                </div>

                  <?php
                }else{
                  echo "<b>4014!</b> Tidak ada halaman !";
                }

                 ?>
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-info d-block text-center text-sm-left d-sm-inline-block"><?=$apl['copyright'];?></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><?=$apl['nama_sekolah'];?> <i class="fa fa-graduation-cap text-danger"></i></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
   <script src="../pelengkap/js/jquery.dataTables.js"></script>
  <script src="../pelengkap/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../pelengkap/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="../pelengkap/sweetalert/sweetalert.min.js"></script>
      <script src="script1.js"></script>
  <script src="../pelengkap/js/off-canvas.js"></script>
  <script src="../pelengkap/js/misc.js"></script>
  <script src="../pelengkap/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script>
     <script>
        CKEDITOR.replace('ckeditor',{
            filebrowserImageBrowseUrl : '../pelengkap/kcfinder'
        });
    </script>
        <script>
      $(document).ready(function() {
    $('#data').DataTable();
    } );
    </script>
</body>
</html>
<?php
} else{

	include 'modul/500.html';
}
