<!-- SATIR 101!E BAK -->
<?php
session_start();
?>



<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMİN YÖNETİM PANELİ</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

 
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      
      <span class="logo-mini"><b>AP</b></span>
      <!-- Ekran küçüldüğünde görünecek logo kısaltması işlemleri (telefona uyumluluk göz önünde bulundurulup her şey ona göre tasaarlanmıştır) -->
      <span class="logo-lg"><b>ADMİN</b> PANELİ</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
   
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                      
   
          <li class="dropdown user user-menu">
      
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 
              <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="user-image" alt="User Image">
             
              <span class="hidden-xs"><?php echo $_SESSION['admins']['admins_namesurname'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
               <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="user-image" alt="User Image">
               <!-- BURAYA BAK -->

                <p>
                  <?php echo $_SESSION['admins']['admins_namesurname'] ?>
                  
                </p>
              </li>
             
             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Çıkış Yap</a>

                </div>
              </li>
            </ul>
          </li>
          
          
        </ul>
      </div>
    </nav>
  </header>