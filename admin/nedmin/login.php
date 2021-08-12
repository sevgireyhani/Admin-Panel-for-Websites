<?php
session_start();
if (isset($_SESSION['admins'])) {
  header("Location:index.php");
  exit;
}
require_once 'netting/class.crud.php';
$db=new crud();



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMİN YÖNETİCİ PANELİ</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <style type="text/css">
  .login-page {

/*LOGIN SAYFASINDA KULLANILAN RESMİN DAHA İYİ GÖRÜNMESİ VE SABİT KALMASI İÇİN ASAĞIDAKİ KODLAMALAR YAPILMIŞTIR*/

    background: url(dimg/images/wallpaper.jpg) no-repeat center center fixed;
    background-size:cover;
    -webkit-background-size:cover;
    -moz-background-size:cover;
    -o-background-size:cover;
  }

  body {

    overflow: hidden;
  }
</style>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>ADMİN </b>PANELİ</a>
    </div>
    <!-- login-logosu -->
    <div class="login-box-body">
      <p class="login-box-msg">Giriş yapmak için bilgilerinizi girin</p>



      <?php 
//aşağıdaki kodlar hata kontrolü için yazılmıştır//
      // echo "<pre>";
      // print_r(json_decode($_COOKIE['adminsLogin']));
      // echo "</pre>";

      if (isset($_COOKIE['adminsLogin'])) {
        $login=json_decode($_COOKIE['adminsLogin']);
      }

      if (isset($_POST['admins_login'])) {

        $sonuc=$db->adminsLogin(htmlspecialchars($_POST['admins_username']),htmlspecialchars($_POST['admins_pass']),$_POST['remember_me']);

        if ($sonuc['status']) {

          header("Location:index.php");
          exit;

        } else {?>

         <div class="alert alert-danger">
           Bilgilerinizi kontrol edin...
         </div>

       <?php }
     }
// Gerekli kontroller yapıldı ve hatalı giriş olduğun zaman gösterilecek mesaj ayarlamaları yapıldı //
     ?>

     <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" 
        <?php
        if (isset($_COOKIE['adminsLogin'])) {
         echo 'value="'.$login->admins_username.'"';
       } else {

        echo 'placeholder="Kullanıcı Adı"';
      }
      ?>
      name="admins_username">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" 
      <?php
      if (isset($_COOKIE['adminsLogin'])) {
        echo 'value="'.$login->admins_pass.'"';
      } else {

        echo 'placeholder="Şifre Girin"';
      }
      ?>
      name="admins_pass">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox" 
            <?php
            if (isset($_COOKIE['adminsLogin'])) {
              echo 'checked';
           } 
          ?>
          name="remember_me"> Beni Hatırla
        </label>
      </div>
    </div>
    
    <!-- col satırları -->
    <div class="col-xs-4">
      <button type="submit" name="admins_login" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
    </div>
 
  </div>
</form>

  

    </div>
  
  </div>
  <!-- /.login-box -->


  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' 
      });
    });
  </script>
</body>
</html>