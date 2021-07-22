<?php
require('top.inc.php');
$id=get_safe_value($con,$_GET['id']);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Orders </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>Product Name</th>
							   <th>Image</th>
							   <th>Qty</th>
							   <th>Unit Price</th>
							   <th>Sub-Total Price</th>
							</tr>
						 </thead>
						 <tbody>
							<?php
							$res=mysqli_query($con,"select distinct(order_details.id) ,order_details.*,products.name,products.image, orders.address,orders.city_state,
							orders.post_code,users.name from order_details,products,orders,users where order_details.order_id='$id' and order_details.product_id=products.id and orders.user_id=users.id");
							$total_price=0;
							while($row=mysqli_fetch_assoc($res)){
								$total_price=$total_price+($row['qty']*$row['price']);
								$name=$row['name'];
								$address=$row['address'];
								$city=$row['city_state'];
								$post_code=$row['post_code'];
								?>
							<tr>
							   <td><?php echo $row['name']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['qty']?></td>
							   <td><?php echo $row['price']?></td>
							   <td><?php echo $row['price'] * $row['qty']?></td>
							</tr>
							<?php } ?>
							<tr>
								<td colspan="2"><td>
								<td class="product-name">Total Price</td>
								<td class="product-name"><?php echo $total_price?></td>
							</tr>
						 </tbody>
					  </table>
				   </div>
				   <div id="client_details">
						<strong>Client's Name</strong>
						<?php echo $name?>
						<br/>
						<strong>Address</strong>
						<?php echo $address?>,<?php echo $city?>
						<br/>
						<strong>Post Code</strong>
						<?php echo $post_code?>
						<br/>
						<strong>Status</strong>
						<?php 
					   		$res=mysqli_query($con,"select orders.order_status from orders where orders.id='$id'");
							$row=mysqli_fetch_assoc($res);
							$status = $row['order_status'];
							if($status==0){
								echo "pending";
							}elseif ($status==1) {
								 echo "Shipped";
							}elseif ($status==2) {
								 echo "Completed";
							}else{
								 echo "Cancelled";
							}
						?>
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