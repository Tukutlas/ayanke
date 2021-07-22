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
		$update_status_sql="update carousel set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from carousel where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from carousel order by id asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Sliders </h4>
				   <h4 class="box-link"><a href="manage_carousel.php">Add Sliders</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>Main Heading</th>
							   <th>Sub Heading</th>
                               <th>Btn Txt</th>
							   <th>Btn Link</th>
                               <th>Image</th>
							   <th>Status</th>
                               <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['main_heading']?></td>
                               <td><?php echo $row['sub_heading']?></td>
                               <td><?php echo $row['btn_txt']?></td>
                               <td><?php echo $row['btn_link']?></td>
                               <td><img class="zoom_out" src="<?php echo SLIDER_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=Inactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Inactive</a></span>&nbsp;";
								}?>
                                </td>
                                <td>
                                <?php
								echo "<span class='badge badge-edit'><a href='manage_carousel.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
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