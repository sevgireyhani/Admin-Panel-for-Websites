<?php
require_once 'header.php'; 

?>

<div class="container">

  
  <h1 class="mt-4 mb-3">Blog Sayfamız
   
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Anasayfa</a>
    </li>
    <li class="breadcrumb-item active ">Blog</li>
  </ol>

  <?php 

  $sql=$db->read("blogs",[
    "columns_name" => "blogs_must",
    "columns_sort" => "ASC"
  ]);
  $say=1;
  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>


    <!-- Blog Post -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <a href="bloglarslug/<?php echo $row['blogs_slug'] ?>">
              <img class="img-fluid rounded" src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" alt="<?php echo $row['blogs_title'] ?>">
            </a>
          </div>
          <div class="col-lg-6">
            <h2 class="card-title"><?php echo $row['blogs_title'] ?></h2>
            <p class="card-text"><?php echo mb_substr($row['blogs_content'], 0,450) ?></p>
            <a href="bloglarid/<?php echo $db->seo($row['blogs_title']); ?>/<?php echo $row['blogs_id'] ?>" class="btn btn-primary">İncele &rarr;</a>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
       <!-- <?php echo $row['blogs_time'] ?>    -->  

       <?php 
       echo $db->tDate($row['blogs_time'],["date_time" => TRUE]);
       ?> 
     </div>
   </div>
 <?php } ?>





 <!-- Pagination -->
  <!--   <ul class="pagination justify-content-center mb-4">
      <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
      </li>
      <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
      </li>
    </ul> -->

  </div>

</div>


<?php require_once 'footer.php'; ?>



