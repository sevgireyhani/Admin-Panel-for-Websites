<?php 
require_once 'header.php';
$sql=$db->wread("blogs","blogs_id",$_GET['blogs_id']);
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



<!-- Aşağıdaki satırlar sayfa yapısını anlamak ve olası düzensiz görünümleri saptayabilmek amacıyla kullanılıp daha sonra yorum satırı haline getirildi -->

        <blockquote class="blockquote">
          <!-- <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p> -->
          <!-- <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer> -->
        </blockquote>

        <hr>

       

      </div>

     
      <div class="col-md-4">


        <!-- Sağ taraftaki admin notu-->
        <div class="card my-4">
          <h5 class="card-header"> </h5>
          <div class="card-body">
            Blog Ayrıntı sayfasına hoşgeldiniz, keyifli okumalar dileriz.
          </div>
        </div>

      </div>

    </div>
    

  </div>

</div>


<?php require_once 'footer.php'; ?>