  <?php 

$sqld = mysqli_query($con,"SELECT * FROM tb_siswa
    INNER JOIN tb_master_kelas ON tb_siswa.id_kelas=tb_master_kelas.id_kelas
  INNER JOIN tb_master_jurusan ON tb_siswa.id_jurusan=tb_master_jurusan.id_jurusan
 WHERE id_siswa = '$sesi' ") or die(mysqli_error($con));
$d = mysqli_fetch_array($sqld);
   ?>
  <div class="content-wrapper">
 <div class="row">
            <div class="col-md-4 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title text-center">My Profile</h4>
                      <p class="card-description text-center"><br>
                      </p>

                      <form class="forms-sample" method="post" action="?page=proses" enctype="multipart/form-data">
                         <div class="form-group">
                      <label>Nis</label>
                      <input type="hidden"  name="ID" value="<?=$data['id_siswa'] ?>">
                      <input type="text" class="form-control" name="nis" value="<?=$data['nis'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" value="<?=$data['nama_siswa'] ?>">
                    </div>

                    
                    <div class="form-group">
                      <label for="jurusan">Jenis Kelamin </label>
                  <select class="form-control" id="jk" name="jk"style="font-weight: bold;">
                  <option>-- Pilih --</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>                    
                </select>
                </div>
                    <div class="form-group">
                      <label>Password Baru</label>
                      <input type="password" name="password" id="myInput" class="form-control" required>
                      <br><input type="checkbox" onclick="myFunction()"><h7> Show Password</h7>                      
                    </div>

          
                    <button type="submit" name="porifilUpdate" class="btn btn-info mr-2">Update</button>
                    <a href="javascript:history.back()" class="btn btn-light">Batal</a>
                  </form>
                      
                    </div>
                  </div>
                </div>
                </div>
                </div>
                 

            </div>
          </div>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>          