<?php 
require_once 'header.php';
require_once 'sidebar.php';
require_once 'netting/class.crud.php';
$db=new crud();


?>


<div class="content-wrapper">
  

  

  <section class="content">


   <?php 

   if (isset($_GET['aboutsInsert'])) {?>
    <div class="box box-primary">



      <div class="content-header">
        <h1 >Hakkımızda Bilgi ve Yazı Ekle</h1>  
        <hr>       
      </div>

      <div class="box-body">

       <?php 
        if (isset($_POST['abouts_insert'])) {

         $sonuc=$db->insert("abouts",$_POST,[
          "form_name" => "abouts_insert",
          "slug" => "abouts_slug",
          "title" => "abouts_title"
         
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
          <label>Hakkımızda Başlık</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="abouts_title" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Hakkımızda Slug</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="abouts_slug" class="form-control">
            </div>
          </div>
        </div>


        <div class="form-group">
          <label>Hakkımızda İçerik</label>
          <div class="row">
            <div class="col-xs-12">
              <textarea id="editor1" class="form-control" name="abouts_content"></textarea>
            </div>
          </div>
        </div>

        <script>
          CKEDITOR.replace( 'editor1' );
        </script>


        <div align="right" class="box-footer">
          <button type="submit" class="btn btn-success" name="abouts_insert">Ekle</button>
        </div>



      </form>
    </div>

  </div>
<?php }  else if (isset($_GET['aboutsUpdate'])) {

 


  ?>

  <div class="box box-primary">



    <div class="content-header">
      <h1 >Hakkımızda Düzenle</h1>  
      <hr>       
    </div>

    <div class="box-body">

      <?php 

      if (isset($_POST['abouts_update'])) {

       $sonuc=$db->update("abouts",$_POST,[
        "form_name" => "abouts_update",
        "slug" => "abouts_slug",
        "title" => "abouts_title",
        "columns" => "abouts_id"
      
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

$sql=$db->wread("abouts","abouts_id",$_GET['abouts_id']);
$row=$sql->fetch(PDO::FETCH_ASSOC);



?>




<form method="POST" enctype="multipart/form-data">

  
 
  <div class="form-group">
    <label>Hakkımızda Slug</label>
    <div class="row">
      <div class="col-xs-12">
        <input type="text" name="abouts_slug" required="" value="<?php echo $row['abouts_slug'] ?>" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Hakkımızda Title</label>
    <div class="row">
      <div class="col-xs-12">
        <input type="text" name="abouts_title" value="<?php echo $row['abouts_title'] ?>" class="form-control">
      </div>
    </div>
  </div>


  
</div>

<div class="form-group">
  <label>Hakkımızda İçerik</label>
  <div class="row">
    <div class="col-xs-12">
      <textarea id="editor1" class="form-control" name="abouts_content"><?php echo $row['abouts_content'] ?></textarea>
    </div>
  </div>
</div>

<script>
  CKEDITOR.replace( 'editor1' );
</script>



<input type="hidden" name="abouts_id" value="<?php echo $row['abouts_id']; ?>">


<div align="right" class="box-footer">
  <button type="submit" class="btn btn-success" name="abouts_update">Düzenle</button>
</div>



</form>
</div>

</div>

<?php }

?>





<div class="box box-primary">

 <div class="content-header">
  <h1 >Hakkımızda Listele</h1>  
  <div align="right">
    <a href="?aboutsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
    <br><br>
  </div>
  <?php 
  if (isset($_GET['aboutsDelete'])) {

   $sonuc=$db->delete("abouts","abouts_id",$_GET['abouts_id'],$_GET['file_delete']);


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
<!-- /.box-header -->
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th align="center" width="5">#</th>
        <th>Hakkımızda</th>
        <th>Hakkımızda Başlık</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="sortable">

      <?php 
      // $sql=$db->qSql("SELECT * FROM abouts  order by abouts_must ASC");

      $sql=$db->read("abouts",[
        "columns_name" => "abouts_must",
        "columns_sort" => "ASC"
      ]);
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <tr id="item-<?php echo $row['abouts_id'] ?>">
        <td class="sortable"></td>
          <td><?php echo $say++; ?></td>
          <td class="sortable"><?php echo $row['abouts_title'] ?></td>

          <td align="center" width="5"><a href="?aboutsUpdate=true&abouts_id=<?php echo $row['abouts_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
          <td align="center" width="5"><a href="?aboutsDelete=True&abouts_id=<?php echo $row['abouts_id'] ?>&file_delete=<?php echo $row['abouts_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
          url:"netting/order-ajax.php?abouts_must=true",
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