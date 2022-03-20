<?php 
include "include/connection.php";
if (isset($_SESSION['newuser'])) {
  header("Location: ./index.php");
} 

if (isset($_POST['submit'])) {
  $user =$_POST['username'];
  $pass =$_POST['password'];
  $log_type = "signin";
  $date_log = date('Y-m-d H:i:m');

  $q = mysql_query("SELECT * FROM tb_users WHERE username='$user' AND password ='$pass'");

  if (mysql_num_rows($q) == 1) {
    session_start();
    $_SESSION['username']=$user;
    $query = mysql_query("INSERT INTO tb_log VALUES(' ','$user','$log_type','$date_log',' ')");
    if ($query) {
      header("Location: ./index.php?SignInsuccess=true");
    } else {
      echo "<h4>". "log error".mysql_error()."</h4>";
    }           
  } else {
    header("Location: ./signin.php?error=true");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign In | E-Kinerja </title>
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <!-- Alert -->
  <script src="assets/sweet/sweetalert2.all.js"></script>
  <script src="assets/sweet/sweetalert2.all.min.js"></script>
  <script src="assets/sweet/sweetalert2.js"></script>
  <script src="assets/sweet/sweetalert2.min.js"></script>
</head>
<style type="text/css">
  .auth .brand-logo img {
    width: 228px;
  }
  .auth .auth-form-light {
    background: #ffffff;
    border-radius: 10px;
  }
</style>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background-image: url('assets/images/bg/bg1.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="assets/images/logo/rs.png" alt="logo">
              </div>
              <h4>Aplikasi E-Kinerja <font style="font-size: 10px;font-weight:600">RSUD Drs. H. Amri Tambunan</font></h4>
              <font class="fw-light" style="font-size: 12px;top:-10px">Silahkan sign in untuk memulai session.</font>
              <form class="pt-3" method="post" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Ingat saya
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" id="ckb1" onclick="myFunction()" class="form-check-input">
                       Tampilkan Password
                    </label>
                  </div>
                  <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                </div>
                <div class="text-center mt-4 fw-light">
                  Version <a href="#" class="text-primary">1.0.2</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Show Password -->
  <script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
  <!-- End Show Password -->
  <script type="text/javascript">
    if (window?.location?.href?.indexOf('error') > -1) {
      Swal.fire({
        title: 'Sign In Failed!',
        icon: 'error',
        text: 'Wrong username or password. Try again or contact Administrator!',
      })
      history.replaceState({}, '', './signin.php');
    }

    if (window?.location?.href?.indexOf('errorAccess') > -1) {
      Swal.fire({
        title: 'Access Failed!',
        icon: 'error',
        text: 'Please contact your administrator!',
      })
      history.replaceState({}, '', './signin.php');
    }
  </script>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>
</html>
