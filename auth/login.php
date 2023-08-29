<?php
require_once "../_config/config.php";
if(isset($_SESSION['user'])){
    echo "<script>window.location='".base_url()."'</script>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | POSYANDU</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>/_assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/_assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/_assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/_assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/_assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>/_assets/index2.html"><b>POSYANDU</b>CIBATU</a>
  </div>
  <?php
  
        if(isset($_POST['login'])){
            $user = trim(mysqli_real_escape_string($con, $_POST['user']));
            $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
            $sql_login = mysqli_query($con, "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ") or die (mysqli_error($con));
            if(mysqli_num_rows($sql_login) > 0){
              $data = mysqli_fetch_array($sql_login);  
              $_SESSION['user'] = $user;
              $_SESSION['user_id'] = $data['user_id'];
              $_SESSION['nip'] = $data['nip'];
              $_SESSION['level'] = $data['level'];
               
                echo "<script>window.location='".base_url()."'</script>";
            } else { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismisable" role="alert">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <strong>Login Gagal</strong> Username / Password Salah
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    ?>
  <div class="login-box-body">
    <p class="login-box-msg">LOGIN / MASUK </p>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-sm-4 pull-right">
          <input type="submit" name="login" class="btn btn-primary btn-block btn-flat" value="MASUK" required>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?=base_url()?>/_assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>/_assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
<?php
}
?>
