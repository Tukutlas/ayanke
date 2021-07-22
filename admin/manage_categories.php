<?php
require('top.inc.php');
$name='';
$msg='';
$image_required = 'required';

if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required = '';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from category where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['category'];
		$image=$row['image'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$res=mysqli_query($con,"select * from category where category='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Category already exist";
			}
		}else{
			$msg="Category already exist";
		}
	}

	if($_FILES['image']['tmp_name']!=''){
		$allowed_types= array(IMAGETYPE_PNG,IMAGETYPE_JPEG);
		$detect_type = exif_imagetype($_FILES['image']['tmp_name']);
		if ($detected = !in_array($detect_type,$allowed_types)){
			$msg = "Please select only png,jpg and jpeg image formats";
		}
	}

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],COLLECTION_IMAGE_SERVER_PATH.$image);
				mysqli_query($con,"update category set category='$name', image='$image' where id='$id'");
			}else{
				mysqli_query($con,"update category set category='$name' where id='$id'");
			}
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],COLLECTION_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into category (category,image,status) values('$name','$image', '1')");
		}
		header('location:categories.php');
		die();
	}
}

?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
				<div class="card-header"><strong>Categories</strong><small> Form</small></div>
				<form method="post" enctype="multipart/form-data">
					<div class="card-body card-block">
						<div class="form-group">
							<label for="category" class="form-control-label">Category</label>
							<input type="text" name="name" placeholder="Enter category's name" class="form-control" required value="<?php echo $name?>">
						</div>
						<div class="form-group">
							<div class="row" id="image_box">
								<div class="col-lg-8">
									<label for="image" class="form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php 
										echo  $image_required?>><?php 
										if ($image!=''){
											echo "<a target='_blank' href='".COLLECTION_IMAGE_SITE_PATH.$image."'>
													<img width='150px'src='".COLLECTION_IMAGE_SITE_PATH.$image."'/>
												</a>"; 
										} ?>
								</div>
							</div>
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