<?php 
require_once 'header.php';
$sql=$db->wread("blogs","blogs_slug",$_GET['blogs_slug']);
$row=$sql->fetch(PDO::FETCH_ASSOC);
//projeyi geliştirmek amacıyla slug yapısı kullanıldı
?>

<div class="container">

    <h1 class="mt-4 mb-3"><?php echo $row['blogs_title'] ?> 
     
    </h1>

   

    <div class="row">

      <div class="col-lg-8">

        <img class="img-fluid rounded" src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" alt="<?php echo $row['blogs_title'] ?>">

        <hr>

        <!-- Date/Time Düzenlemeleri Yapılıp Sayfada Gösterilmesi Sağlandı -->
        <p><?php 
       echo $db->tDate($row['blogs_time'],["date_time" => TRUE]);
       ?> </p>

        <hr>
        <div align="justify">
       <p><?php echo $row['blogs_content'] ?></p>
</div>

        <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>


<!-- Aşağıdaki satırlar sayfa yapısını anlamak ve olası düzensiz görünümleri saptayabilmek amacıyla kullanılıp daha sonra yorum satırı haline getirildi -->


      
        <hr>

       

      </div>

   
      <div class="col-md-4">

     
        <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
           
          </div>
        </div>

      </div>

    </div>


  </div>

</div>


<?php require_once 'footer.php'; ?>