 <!-- Sol taraf -->
  <aside class="main-sidebar">

    <section class="sidebar">

      <!-- Sidebar kullanıcı paneli  -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="user-image" alt="User Image">

        <!--  <img src="dimg/images/wallpaper.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['admins']['admins_namesurname'] ?></p>
          
          <a href="#"> Yönetici</a>
        </div>
      </div>

     

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menüler</li>
        
       
        <li><a href="index.php"><i class="fa fa-home"></i> <span>Gösterge Paneli</span></a></li>
        <li><a href="sliders.php"><i class="fa fa-image"></i> <span>Slider</span></a></li>
        <li><a href="abouts.php"><i class="fa fa-info"></i> <span>Hakkımızda</span></a></li>
        <li><a href="blogs.php"><i class="fa fa-file"></i> <span>Blog Sayfası</span></a></li>
        
                <li class="active treeview">
          <a href="#"><i class="fa fa-key"></i> <span>Kullanıcı İşlemleri</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
         
          <li><a href="users.php"><i class="fa fa-user"></i>Kullanıcılar</a></li>
            <li><a href="admins.php"><i class="fa fa-user"></i>Yöneticiler</a></li>
            
          </ul>
        </li>


        <li class="active treeview">
          <a href="#"><i class="fa fa-key"></i> <span>Yönetim</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="settings.php"><i class="fa fa-cog"></i>Ayarlar</a></li>
          
            
          </ul>
        </li>
      </ul>
    
    </section>
    
  </aside>