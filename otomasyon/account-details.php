<?php 
require_once 'header.php';
//require_once 'sidebar.php';
require_once 'netting/class.crud.php';
$db=new crud();

$sql=$db->wread("account","account_id",htmlspecialchars($_GET['account_id']));
$row_account=$sql->fetch(PDO::FETCH_ASSOC);

?>



  <section class="content">


    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Hesap Detayı</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">

            <section class="invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="page-header">
                    <i class="fa fa-globe"></i><?php echo empty($row_account['account_company']) ? $row_account['account_authorized_name_surname'] : $row_account['account_company'] ?>
                    <small class="pull-right"><?php echo $db->tDate($row_account['account_date'],["date_time" => TRUE]) ?></small>
                  </h2>
                </div>
                
              </div>
          
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong></strong><br>
                    <?php echo $row_account['account_authorized_name_surname'] ?><br>
                    <?php echo $row_account['account_email'] ?><br>
                    <?php echo $row_account['account_phone'] ?><br>
                    <?php echo $row_account['account_adress'] ?>
                  </address>
                </div>
               
                <div class="col-sm-4 invoice-col">
    
        </div>
        
        <div class="col-sm-4 invoice-col">
         
        </div>
        
      </div>
     

    
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <h2 class="page-header">Hesaba Yapılan Satışlar</h2>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th align="center" width="5">#</th>
                <th>Tarih</th>
                <th>Ürün, Hizmet</th>
                <th>Hesap</th>
                <th>Tutar</th>
                <th>Tahsilat</th>
                <th>Kalan</th>

              </tr>
            </thead>
            <tbody>

              <?php 
              $sql=$db->qSQL("SELECT * FROM sales INNER JOIN account ON account.account_id=sales.account_id INNER JOIN products ON products.products_id=sales.products_id WHERE sales.account_id='{$_GET['account_id']}'");

              $say=1;
              while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

                <tr> 
                  <td><?php echo $say++; ?></td>
                  <td width="150"><?php echo $db->tDate($row['sales_date'],["date_time" => TRUE]) ?></td>
                  <td><?php echo $row['products_title'] ?></td>
                  <td><?php echo empty($row['account_company']) ? $row['account_authorized_name_surname'] : $row['account_company'] ?></td>
                  <td><?php echo $row['products_price'] ?> ₺</td>
                  <td>
                    <?php 
                    $sql_revenue=$db->qSQL("SELECT SUM(operation_price) as revenue FROM operation WHERE operation_type='Gelir' AND account_id='{$_GET['account_id']}' AND products_id='{$row['products_id']}'");
                    $revenue=$sql_revenue->fetch(PDO::FETCH_ASSOC);
                    echo number_format($revenue['revenue'],2);
                    ?> ₺
                  </td>
                  <td><?php echo $row['products_price']-$revenue['revenue'] ?> ₺</td>


                </tr>

              <?php } ?>

            </table>
          </div>
          
        </div>
       
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <h2 class="page-header">Gelir, Gider Hareketleri</h2>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th align="center" width="5">#</th>
                  <th>Tarih</th>
                  <th>Tip</th>
                  <th>Ürün</th>
                  <th>Hesap</th>
                  <th>Tutar</th>
                  <th>Açıklama</th>


                </tr>
              </thead>
              <tbody>

                <?php 
                $sql=$db->qSQL("SELECT * FROM operation INNER JOIN account ON account.account_id=operation.account_id WHERE operation.account_id='{$_GET['account_id']} order by operation.operation_id DESC'");

                $say=1;
                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

                  <tr> 
                    <td><?php echo $say++; ?></td>
                    <td width="100"><?php echo $db->tDate($row['operation_date'],["date_time" => TRUE]) ?></td>
                    <td><?php echo ($row['operation_type']=='Gelir') ? "<span class='label label-success'>Gelir</span>" : "<span class='label label-danger'>Gider</span>" ?></td>
                    <td align="center"><?php echo $row['products_title'] ?></td>
                    <td><?php echo empty($row['account_company']) ? $row['account_authorized_name_surname'] : $row['account_company'] ?></td>
                    <td><?php echo $row['operation_price'] ?></td>
                    <td><?php echo $row['operation_description'] ?></td>


                  </tr>

                <?php } ?>

              </table>
            </div>
        
          </div>
         

          <div class="row">
            <hr>
            
            <div class="col-xs-6">
              <p class="lead">Bilgi:</p>


              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; ">
                Şirketinizin ayrıntılarını bu sayfadan görebilirsiniz
              </p>
            </div>
            
            <div class="col-xs-6">
              <p class="lead">Hesap Özeti</p>

              <div class="table-responsive">
                <table class="table">
                  <tbody><tr>
                    <th style="width:50%">Toplam Satış:</th>
                    <td>
                      <?php 
                      $sql=$db->qSQL("SELECT SUM(products_price) as sales_total FROM sales INNER JOIN account ON account.account_id=sales.account_id INNER JOIN products ON products.products_id=sales.products_id WHERE sales.account_id='{$_GET['account_id']}'");
                       $sales_total=$sql->fetch(PDO::FETCH_ASSOC);
                       echo number_format($sales_total=$sales_total['sales_total']);
                      ?> ₺

                    </td>
                  </tr>
                  <tr>
                    <th>Gelir (Tahsil)</th>
                    <td>
                      <?php 
                      $sql=$db->qSQL("SELECT SUM(operation_price) as revenue FROM operation  WHERE operation.operation_type='Gelir' AND account_id='{$_GET['account_id']}'");
                       $revenue=$sql->fetch(PDO::FETCH_ASSOC);
                       echo number_format($revenue=$revenue['revenue']);
                      ?> ₺

                    </td>
                  </tr>
                  <tr>
                    <th>Gider</th>
                    <td><?php 
                      $sql=$db->qSQL("SELECT SUM(operation_price) as expense FROM operation  WHERE operation.operation_type='Gider' AND account_id='{$_GET['account_id']}'");
                       $expense=$sql->fetch(PDO::FETCH_ASSOC);
                       echo number_format($expense=$expense['expense']);
                      ?> ₺</td>
                  </tr>
                  <tr>
                    <th>Bakiye:</th>
                    <td>
                      <?php echo number_format($sales_total-$revenue) ?>₺
                    </td>
                  </tr>
                  <tr>
                    <th>Kar:</th>
                    <td>
                      <?php echo number_format($sales_total-$expense); ?> ₺
                    </td>
                  </tr>
                </tbody></table>
              </div>
            </div>
           
          </div>
  

        </section>
      </div>


      </div>


    </section>

  </div>


  <?php require_once 'footer.php'; ?>


