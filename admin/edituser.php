<?php  
  session_start(); 
  include('../koneksi/koneksi.php'); 
  if(isset($_GET['data'])){ 
   $id_user = $_GET['data']; 
   $_SESSION['id_edit_user']=$id_user; 
   
  //get data user
    $sql_u = "SELECT `id_user`,`nama`,`email`,`username`,`level`
    FROM `user` WHERE `id_user`=$id_user ORDER BY `id_user`"; 
    $query_u = mysqli_query($koneksi,$sql_u); 
    while($data_u = mysqli_fetch_row($query_u)){ 
       $id_user = $data_u[0]; 
       $nama = $data_u[1]; 
       $email = $data_u[2]; 
       $username = $data_u[3];
       $level = $data_u[4]; 
    } 
  } 
?> 
<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include("includes/header.php") ?>

  <?php include("includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="user.php">Data User</a></li>
              <li class="breadcrumb-item active">Edit Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data User</h3>
        <div class="card-tools">
          <a href="user.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
        <?php if(!empty($_GET['notif'])){?> 
          <?php if($_GET['notif']=="editkosong"){?> 
            <div class="alert alert-danger" role="alert">Maaf data nama, email, dan username wajib di isi</div> 
          <?php }?> 
        <?php }?> 
      </div>
      <form class="form-horizontal" method="post" action="konfirmasiedituser.php" enctype="multipart/form-data">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i
            class="fas fa-user-circle"></i><u>Data User</u></span></label>
          </div>
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="form-control" name="foto" id="customFile">
              </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="email" id="email" value="<?= $email ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="username" id="username"
              value="<?= $username ?>" required>
            </div>
          </div>

         <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-9 col-sm-6" style="padding-right: 0px">
              <input type="password" class="inpass form-control" name="password" id="input-password" value="">
              <span class="text-danger" style="font-weight:lighter;font-size:12px">
               *Jangan diisi jika tidak ingin mengubah password</span>
            </div>
            <div><p id="password" class="showpass form-control">
              <i id="hide-password" class="fas fa-eye-slash" style="color: #ced4da" onclick="show('password')"></i>
              <i id="show-password" class="fas fa-eye" style="display: none" onclick="hide('password')"></i>
            </p></div>
          </div>

          <div class="form-group row">
            <label for="level" class="col-sm-3 col-form-label">Level</label>
            <div class="col-sm-7">
              <select class="form-control" id="jurusan" name="level">
                <option value="Superadmin">Superadmin</option>
                <option value="Admin">Admin</option>
              </select>
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php") ?>

</div>
<!-- ./wrapper -->

<?php include("includes/script.php") ?>
</body>
</html>
