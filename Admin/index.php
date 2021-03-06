<?php
session_start();
include '../config/db.php';

if (@$_SESSION['Admin']) {
?>
<?php
if (@$_SESSION['Admin']) {
$sesi = @$_SESSION['Admin'];
}
$sql = mysqli_query($con,"SELECT * FROM tb_admin WHERE id_admin = '$sesi'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$sekolah = mysqli_query($con,"SELECT * FROM tb_sekolah WHERE id_sekolah=1 ");
$apl = mysqli_fetch_array($sekolah);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PintarBersama | <?=$data['nama_lengkap']; ?></title>\
  <link rel="stylesheet" href="../pelengkap/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../pelengkap/node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../pelengkap/node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../pelengkap/css/style.css">
  <link rel="shortcut icon" href="../pelengkap/images/favicon.png" />
   <link href="../pelengkap/sweetalert/sweetalert.css" rel="stylesheet" />
  <script type="text/javascript" src="../pelengkap/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="../pelengkap/css/jquery.dataTables.css">
</head>

<body>


  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color: #1991eb;">
        <a class="navbar-brand brand-logo" href="index.php" style="font-family:Aegyptus;font-weight: bold;font-size: 30px;">
          <img src="../pelengkap/images/<?=$apl['logo'];?>" alt="logo" style="height: 45px;width: 45px;border-radius: 10px;">
          <b><?=$apl['textlogo'];?></b>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

          <li class="nav-item" style="width: 400px;">
            <a href="#" style="color: #fff;text-decoration: none;">
            	<b><?=$apl['nama_sekolah'];?></b></a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right" style="border-top-left-radius:50px;color: black;border-bottom-left-radius:50px;color: #fff;border:1px dashed #00BCD4; ">
          <?php
          $ujian = mysqli_query($con,"SELECT * FROM ujian
          INNER JOIN tb_master_mapel ON ujian.id_mapel=tb_master_mapel.id_mapel
          INNER JOIN tb_jenisujian ON ujian.id_jenis=tb_jenisujian.id_jenis
          INNER JOIN kelas_ujian ON ujian.id_ujian=kelas_ujian.id_ujian
           WHERE ujian.id_guru='$data[id_guru]' AND kelas_ujian.aktif='Y' GROUP BY kelas_ujian.id_ujian    "); 
           $jm= mysqli_num_rows($ujian);       
            ?>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-ring"></i>
              <span class="count"><?=$jm; ?> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left"> Pemberitahuan Ujian
                </p>
              </a>
              <?php
              foreach ($ujian as $uj) { ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item" href="?page=ujian&act=status&id=<?=$uj['id_ujian'] ?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="fa fa-pencil"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium"><?=$uj['mapel'] ?> </h6>
                  <p class="font-weight-light small-text">
                  <?=$uj['jenis_ujian'] ?>
                  </p>
                </div>
              </a>
              <?php } ?>
            </div>
          </li>
            <li class="nav-item d-none d-lg-block">
            <a class="nav-link" href="index.php?page=setting&act=user">              
              <b>My Profile</b>
               <img class="img-xs rounded-circle" src="../pelengkap/images/img_Guru/<?=$data['foto']; ?>" alt="">
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
              <div class="profile-image"> <img src="../pelengkap/images/img_Guru/<?=$data['foto']; ?>" alt="image" style="border:3px solid black;"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?=$data['nama_lengkap']; ?></p>
                <p class="designation">Administrasion</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item">
          	<a class="nav-link" href="index.php"><img class="menu-icon" src="../pelengkap/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">DASHBOARD</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#masterData" aria-expanded="false" aria-controls="general-pages"> <i class="fa fa-database"style="font-size:20px;"></i> &nbsp; <span class="menu-title"> Belajar </span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="masterData" style="background-color:#212121;">
              <ul class="nav flex-column sub-menu">
                <p></p>
                <li class="nav-item">
                 	 <a class="nav-link" href="?page=kelas" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;color:#fff;"></i> &nbsp;
                       <span class="menu-title">Kelas</span></a>
               </li>
               
              <li class="nav-item">
                 	 <a class="nav-link" href="?page=jurusan" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;"></i> &nbsp;<span class="menu-title">Jurusan</span></a>
               </li>

               <li class="nav-item">
                 	 <a class="nav-link" href="?page=semester" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;"></i> &nbsp;<span class="menu-title">BAB</span></a>
               </li>

               <li class="nav-item">
                 	 <a class="nav-link" href="?page=mapel" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;"></i> &nbsp;<span class="menu-title">Mata Pelajaran</span></a>
               </li>

               <li class="nav-item">
                 	 <a class="nav-link" href="?page=jenisujian" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;"></i> &nbsp;<span class="menu-title">Jenis Ujian</span></a>
               </li>


            
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#evaluasi" aria-expanded="false" aria-controls="general-pages"> <i class="fa fa-spin fa-gear icon-md"style="font-size:20px;"></i> &nbsp; <span class="menu-title"> USER </span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="evaluasi" style="background-color:#212121;">

              <ul class="nav flex-column sub-menu">
                   <p></p>
                <li class="nav-item">
                 	 <a class="nav-link" href="?page=guru" style="color:#fff;">
                    <i class="fa fa-user-circle" style="font-size:20px;color:#fff;"></i> &nbsp;&nbsp;
                       <span class="menu-title">GURU</span></a>
             	</li>
                <li class="nav-item">
                 	 <a class="nav-link" href="?page=siswa" style="color:#fff;">
                    <i class="fa fa-user-circle-o" style="font-size:20px;color:#fff;"></i> &nbsp;&nbsp;<span class="menu-title">SISWA</span></a>
             	</li>
             	</li>
              </ul>
            </div>
          </li>
      <li class="nav-item">
                   <a class="nav-link" href="?page=setting">
                    <i class="fa fa-gears" style="font-size:20px;"></i> &nbsp;&nbsp;<span class="menu-title">SETTING</span></a>
              </li>

                <li class="nav-item">
                   <a class="nav-link" href="?page=setting&act=user">
                    <i class="fa fa-user" style="font-size:20px;"></i> &nbsp;&nbsp;<span class="menu-title">Profil</span></a>
              </li>
          <hr>

          <li class="nav-item purchase-button">
          	<a class="nav-link" href="logout.php">
          	Keluar</a>
          </li>

        </ul>
      </nav>
      <div class="main-panel">
            <?php
            error_reporting();
            $page = @$_GET['page'];
            $act = @$_GET['act'];

            if ($page=='kelas') {
            if ($act=='') {
            include 'modul/kelas/data_kelas.php';
            }elseif ($act=='del') {
            include 'modul/kelas/del_kelas.php';
            }

            }elseif ($page=='jurusan') {
            if ($act=='') {
            include 'modul/jurusan/data_jurusan.php';
            }elseif ($act=='del') {
            include 'modul/jurusan/del_jurusan.php';
            }
            }elseif ($page=='semester') {
            if ($act=='') {
            include 'modul/bab/data_bab.php';
            }elseif ($act=='del') {
            include 'modul/bab/del_bab.php';
            }
            }elseif ($page=='mapel') {
            if ($act=='') {
            include 'modul/mapel/data_mapel.php';
            }elseif ($act=='del') {
            include 'modul/mapel/del_mapel.php';
            }
            }elseif ($page=='jenisujian') {
            if ($act=='') {
            include 'modul/jenisujian/data_jenisujian.php';
            }elseif ($act=='del') {
            include 'modul/jenisujian/del_jenisujian.php';
            }
            }
            elseif ($page=='jenisperangkat') {
            if ($act=='') {
            include 'modul/jenisperangkat/data_perangkat.php';
            }elseif ($act=='del') {
            include 'modul/jenisperangkat/del_perangkat.php';
            }
            }elseif ($page=='guru') {
            if ($act=='') {
            include 'modul/guru/data_guru.php';
            }elseif ($act=='del') {
            include 'modul/guru/del_guru.php';
            }elseif ($act=='confirm') {
            include 'modul/guru/confir_guru.php';
            }elseif ($act=='unconfirm') {
            include 'modul/guru/unconfir_guru.php';
            }elseif ($act=='add') {
            include 'modul/guru/add_guru.php';
            }elseif ($act=='edit') {
            include 'modul/guru/edit_guru.php';
            }
            }elseif ($page=='siswa') {
            if ($act=='') {
            include 'modul/siswa/data_siswa.php';
            }elseif ($act=='del') {
            include 'modul/siswa/del_siswa.php';
            }elseif ($act=='confirm') {
            include 'modul/siswa/confir_siswa.php';
            }elseif ($act=='unconfirm') {
            include 'modul/siswa/unconfir_siswa.php';
            }elseif ($act=='add') {
            include 'modul/siswa/add_siswa.php';
            }elseif ($act=='edit') {
            include 'modul/siswa/edit_siswa.php';
            }
            }elseif ($page=='setting') {
            if ($act=='') {
             include 'modul/setting/setting.php';
           }elseif ($act=='user') {
             include 'modul/setting/setting_user.php';
           }
            }elseif ($page=='proses') {
            include 'modul/procces.php';
            }elseif ($page=='') {
            include 'Home.php';
            }else{
            echo "<b>4014!</b> Tidak ada halaman !";
            }

            ?>
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-info d-block text-center text-sm-left d-sm-inline-block">
              <?=$apl['copyright'];?>
            </span>

            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><?php echo $apl['nama_sekolah']; ?> <i class="fa fa-graduation-cap text-danger"></i></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="../pelengkap/js/jquery.min.js"></script>
  <script src="../pelengkap/js/jquery.dataTables.js"></script>
  <script src="../pelengkap/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../pelengkap/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="../pelengkap/sweetalert/sweetalert.min.js"></script>
      <script src="script.js"></script>
  <script src="../pelengkap/js/off-canvas.js"></script>
  <script src="../pelengkap/js/misc.js"></script>
     <script>
        CKEDITOR.replace('ckeditor',{
            
            filebrowserImageBrowseUrl : '../pelengkap/kcfinder',
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
