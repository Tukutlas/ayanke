<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='shipped'){
			$status='1';
		}elseif($operation=='cancel'){
			$status='3';
		}else{
			$status='2';
		}
		$update_status_sql="update orders set order_status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
}

$sql="select orders.*,users.name from orders,users where orders.user_id=users.id order by id asc";
$res=mysqli_query($con,$sql);
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
							   <th>ID</th>
							   <th>Client Name</th>
							   <th>Address</th>
							   <th>City/State</th>
							   <th>Post Code</th>
							   <th>Total Price</th>
							   <th>Payment Status</th>
							   <th>Order Status</th>
							   <th>Ordered On</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><a href="order_details.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['address']?></td>
							   <td><?php echo $row['city_state']?></td>
							   <td><?php echo $row['post_code']?></td>
							   <td><?php echo $row['total_price']?></td>
							   <td><?php echo $row['payment_status']?></td>
							   <td>
								<?php if($row['order_status']==0){
								   echo "pending";
								}elseif ($row['order_status']==1) {
									echo "Shipped";
								}elseif ($row['order_status']==2) {
									echo "Completed";
								}else {
									echo "Cancelled";
								}
								   ?></td>
							   <td><?php echo $row['created_at']?></td>
							   <td>
								<?php
									if($row['order_status']==0){
										echo "<span class='badge badge-edit'><a href='?type=status&operation=shipped&id=".$row['id']."'>Shipped</a></span>&nbsp;";
										echo "<span class='badge badge-delete'><a href='?type=status&operation=cancel&id=".$row['id']."'>Cancel</a></span>&nbsp;";
									}elseif($row['order_status']==1){
										echo "<span class='badge badge-complete'><a href='?type=status&operation=completed&id=".$row['id']."'>Completed</a></span>&nbsp;";
									}
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