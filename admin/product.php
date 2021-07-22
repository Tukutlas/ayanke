<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update products set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select products.*,category.category,sub_category.sub_category from products join category on products.category_id=category.id join sub_category on products.sub_category_id=sub_category.id order by products.id asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <!-- <h4 class="box-link"><a href="manage_product.php">Add Product</a> </h4> -->
				   <span class='badge badge-add'><a href="manage_product.php">Add Product</a></span>&nbsp;
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>Category</th>
							   <th>Sub-Category</th>
							   <th>Name</th>
							   <th>Price</th>
							   <th>Image</th>
							   <th>MRP</th>							   
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php
							while($row=mysqli_fetch_array($res)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['category']?></td>
							   <td><?php echo $row['sub_category']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['price']?></td>
							   <td><img class="zoom_out" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['mrp']?></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>