<?php 
require_once 'header.php';
require_once 'sidebar.php';
require_once 'netting/class.crud.php';
$db=new crud();

?>


<div class="content-wrapper">
 
  

  <section class="content">


   <?php 

   if (isset($_GET['slidersInsert'])) {?>
    <div class="box box-primary">



      <div class="content-header">
        <h1 >Slider Ekle</h1>  
        <hr>       
      </div>

      <div class="box-body">

        <?php 
        if (isset($_POST['sliders_insert'])) {

         $sonuc=$db->insert("sliders",$_POST,[
          "form_name" => "sliders_insert",
          "dir" => "sliders",
          "file_name" => "sliders_file"
        ]
      );

      if ($sonuc['status']) {?>
       <div class="alert alert-success">
         Kayıt Başarılı
       </div>
     <?php } else {?>

      <div class="alert alert-danger">
       Kayıt Başarısız.<?php echo $sonuc['error'] ?>
     </div>
   <?php }
 }
 ?>


     


      <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label>Resim Seç</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="file" name="sliders_file" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Slider Title</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="sliders_title" required="" class="form-control">
            </div>
          </div>
        </div>

   
        </script>


        <div align="right" class="box-footer">
          <button type="submit" class="btn btn-success" name="sliders_insert">Ekle</button>
        </div>



      </form>
    </div>

  </div>
<?php }  else if (isset($_GET['slidersUpdate'])) {

  


  ?>

  <div class="box box-primary">



    <div class="content-header">
      <h1 >Slider Düzenle</h1>  
      <hr>       
    </div>

    <div class="box-body">

      <?php 

      if (isset($_POST['sliders_update'])) {

       $sonuc=$db->update("sliders",$_POST,[
        "form_name" => "sliders_update",
        "columns" => "sliders_id",
        "dir" => "sliders",
        "file_name" => "sliders_file",
        "file_delete" => "delete_file"
      ]
    );

    if ($sonuc['status']) {?>
     <div class="alert alert-success">
       Kayıt Başarılı
     </div>
   <?php } else {?>

    <div class="alert alert-danger">
     Kayıt Başarısız.<?php echo $sonuc['error'] ?>
   </div>
 <?php }
}

$sql=$db->wread("sliders","sliders_id",$_GET['sliders_id']);
$row=$sql->fetch(PDO::FETCH_ASSOC);



?>

<!-- Düzenleme İşlemleri -->


<form method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label>Yüklü Resim</label>
    <div class="row">
      <div class="col-xs-12">
        <img width="100" src="dimg/sliders/<?php echo $row['sliders_file'] ?>">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Resim Seç</label>
    <div class="row">
      <div class="col-xs-12">
        <input type="file" name="sliders_file" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Slider Title</label>
    <div class="row">
      <div class="col-xs-12">
        <input type="text" name="sliders_title" required="" value="<?php echo $row['sliders_title'] ?>" class="form-control">
      </div>
    </div>
  </div>

  
</div>




<input type="hidden" name="sliders_id" value="<?php echo $row['sliders_id']; ?>">
<input type="hidden" name="delete_file" value="<?php echo $row['sliders_file']; ?>">

<div align="right" class="box-footer">
  <button type="submit" class="btn btn-success" name="sliders_update">Düzenle</button>
</div>



</form>
</div>

</div>

<?php }

?>





<div class="box box-primary">

 <div class="content-header">
  <h1 >Slider Listele</h1>  
  <div align="right">
    <a href="?slidersInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
    <br><br>
  </div>
  <?php 
  if (isset($_GET['slidersDelete'])) {

   $sonuc=$db->delete("sliders","sliders_id",$_GET['sliders_id'],$_GET['file_delete']);


   if ($sonuc['status']) {?>
     <div class="alert alert-success">
       Silme Başarılı
     </div>
   <?php } else {?>

    <div class="alert alert-danger ">
     Silme Başarısız.<?php echo $sonuc['error'] ?>
   </div>
 <?php }
}
?>
</div>

<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th align="center" width="5">#</th>
        <th>Slider</th>
        <th>Slider Başlık</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="sortable">

      <?php 
      // $sql=$db->qSql("SELECT * FROM sliders  order by sliders_must ASC");

      $sql=$db->read("sliders",[
        "columns_name" => "sliders_must",
        "columns_sort" => "ASC"
      ]);
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

       <tr id="item-<?php echo $row['sliders_id'] ?>">
          <td><?php echo $say++; ?></td>
          <td class="sortable"><img width="100" src="dimg/sliders/<?php echo $row['sliders_file'] ?>"></td>
          <td><?php echo $row['sliders_title'] ?></td>

          <td align="center" width="5"><a href="?slidersUpdate=true&sliders_id=<?php echo $row['sliders_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
          <td align="center" width="5"><a href="?slidersDelete=True&sliders_id=<?php echo $row['sliders_id'] ?>&file_delete=<?php echo $row['sliders_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
        </tr>

      <?php } ?>

    </table>
  </div>
  
</div>

</section>

</div>


<?php require_once 'footer.php'; ?>

<script type="text/javascript">

  $(function() {
    $("#sortable").sortable({
      revert:true,
      handle:".sortable",
      stop:function(event,ui) {
        var data=$(this).sortable('serialize');
       
        $.ajax({
          type:"POST",
          dataType:"json",
          data:data,
          url:"netting/order-ajax.php?sliders_must=true",
          success:function(msg) {
          if (msg.islemMsj) {
            alert("Sıralama Başarılı");
          } else {
            alert("Hata Var...");
          }
          
          }
        });
      }



    });
    $("#sortable").disableSelection();
  });

</script>