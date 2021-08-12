 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="user-image" alt="User Image">

        <!--  <img src="dimg/images/wallpaper.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['admins']['admins_namesurname'] ?></p>
          <!-- Status -->
          <a href="#"> Yönetici</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menüler</li>
        <!-- Optionally, you can add icons to the links -->
       
        <li><a href="index.php"><i class="fa fa-home"></i> <span>Gösterge Paneli</span></a></li>

         <li><a href="sales.php"><i class="fa fa-user"></i> <span>Satışlar</span></a></li>

         <li><a href="operation.php"><i class="fa fa-user"></i> <span>Gelir, Gider</span></a></li>
        
        <li><a href="account.php"><i class="fa fa-user"></i> <span>Hesaplar</span></a></li>
        <li><a href="products.php"><i class="fa fa-th-large"></i> <span>Ürünler ve Hizmetler</span></a></li>

        <li class="active treeview">
          <a href="#"><i class="fa fa-key"></i> <span>Yönetim</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="admins.php"><i class="fa fa-user"></i>Yöneticiler</a></li>
          <li><a href="settings.php"><i class="fa fa-cog"></i>Ayarlar</a></li>
          
            
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>