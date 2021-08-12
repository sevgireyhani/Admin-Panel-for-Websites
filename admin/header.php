<?php require_once 'settings.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title><?php echo $settings['title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $settings['description']; ?>">
  <meta name="author" content="<?php echo $settings['author']; ?>">


  <base href="http://localhost/admin/index.php">
  
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="css/modern-business.css" rel="stylesheet">
  


</head>


<body>

  
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
     <a class="navbar-brand" href="index.php"> <img width="0" height="30" =""> <?php echo $settings['logo_text'] ?></a>
      <!-- <a class="navbar-brand" href="index.html"> <img width="80" src="nedmin/dimg/settings/6101445be46fc.jpg"> </a> -->
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Anasayfa</a>
          </li>
           <li class="nav-item">
             <a class="nav-link" href="kurumsal/<?php $db->slugRead("abouts"); ?>">Hakkımızda</a>

             <!-- hakkımızda bölümünde hakkımızda barındaki ilk başlığa yönlendirildi ve ilk başlık silinirse diye de slug yapısıyla bağlayıp dinamik hale getirildi -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

