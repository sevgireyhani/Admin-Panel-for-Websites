<?php 
require_once 'class.crud.php';
$db=new crud();

if (isset($_POST['account_id'])) {
	
	$sql=$db->qSQL("SELECT * FROM sales INNER JOIN account ON account.account_id=sales.account_id INNER JOIN products ON products.products_id=sales.products_id WHERE sales.account_id='{$_POST['account_id']}'");

	if ($sql->rowCount()>0) {?>
		

		<div id="products" class="form-group">
			<label>Hesap Seç</label>
			<div class="row">
				<div class="col-xs-12">
					<select class="form-control account"  name="products_id">
						<option value="">Seçim Yapın</option>
						<?php 
						$sql=$db->read("products",[
							"columns_name" => "products_id",
							"columns_sort" => "DESC"
						]);
						$say=1;
						while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
							<option value="<?php echo $row['products_id'] ?>"><?php echo $row['products_title'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

	<?php } else {

		echo "FALSE";
	}

}
?>