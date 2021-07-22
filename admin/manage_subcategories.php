<?php
require('top.inc.php');
$category_id='';
$sub_category ='';
$msg = '';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sub_category where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$category_id=$row['category_id'];
		$sub_category=$row['sub_category'];
	}else{
		header('location:sub_categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$category_id=get_safe_value($con,$_POST['category_id']);
    $sub_category=get_safe_value($con,$_POST['sub_category']);
    $date= date('Y-m-d h:i:s');

	$res=mysqli_query($con,"select * from sub_category where sub_category='$sub_category'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Sub-Category already exist";
			}
		}else{
			$msg="Sub-Category already exist";
		}
	}
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update sub_category set category_id='$category_id',sub_category='$sub_category' where id='$id'");
		}else{
			mysqli_query($con,"insert into sub_category (category_id,sub_category,datetime) values ('$category_id','$sub_category','$date')");
		}
		header('location:sub_categories.php');
		die();
	}
}

?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
				<div class="card-header"><strong>Product</strong><small> Form</small></div>
				<form method="post" enctype="multipart/form-data">
					<div class="card-body card-block">
						<div class="form-group">
							<label for="category" class="form-control-label">Category</label>
							<select class="form-control" name="category_id">
								<option>Select Category</option>
								<?php
								$res=mysqli_query($con,"select id,category from category order by category asc");
								while($row=mysqli_fetch_assoc($res)){
									if($row['id']==$category_id){
										echo "<option selected value=".$row['id'].">".$row['category']."</option>";
									}else{
										echo "<option value=".$row['id'].">".$row['category']."</option>";
									}
								}
								?>
							</select>
						</div>
                        <div class="form-group">
							<label for="product" class="form-control-label">Sub-Category</label>
							<input type="text" name="sub_category" placeholder="Enter Sub-Category's name" class="form-control" required value="<?php echo $sub_category?>">
						</div>
                        
						<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							<span id="payment-button-amount">Submit</span>
						</button>
						<div class="field_error"><?php echo $msg?></div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php
require('footer.inc.php');
?>