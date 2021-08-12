
 <?php 
require_once 'header.php'; 
require_once 'slider.php'; 
?>




  <div class="container">

    


  <h2 class="mt-4">Anasayfa</h2>

  <div class="row mt-4">

    <?php 

    $sql=$db->read("blogs",[
      "columns_name" => "blogs_must",
      "columns_sort" => "DESC",
      "limit" => 6
    ]);
    $say=1;
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>


      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="bloglar/<?php echo $db->seo($row['blogs_title']); ?>/<?php echo $row['blogs_id'] ?>"><img class="card-img-top" src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" alt="<?php echo $row['blogs_title'] ?>"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="bloglar/<?php echo $db->seo($row['blogs_title']); ?>/<?php echo $row['blogs_id'] ?>"><?php echo $row['blogs_title'] ?></a>
            </h4>
            <p class="card-text"><?php echo mb_substr($row['blogs_content'], 0,200) ?></p>
             <a href="bloglar/<?php echo $db->seo($row['blogs_title'])."/".$row['blogs_id'] ?>" class="btn btn-primary">İncele &rarr;</a>
          </div>

        </div>
      </div>

    <?php } ?>
</div>
    


    <div class="row">
      <div class="col-lg-6">
        <p><?php echo $settings['home01_content']; ?></p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="nedmin/dimg/settings/<?php echo $settings['home_01_file']; ?>" alt="">
      </div>
    </div>
    

    <hr>

  
    <div class="row mb-4">
      <div class="col-md-8">
        <p><?php echo $settings['slogan']; ?></p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="<?php echo $settings['slogan_url']; ?>">ADMİN PANELİ</a>
      </div>
    </div>

  </div>
  

 <?php require_once 'footer.php'; ?>