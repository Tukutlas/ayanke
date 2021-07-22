<?php
require('top.inc.php');
$category_id='';
$sub_category_id='';
$name ='';
$price ='';
$image_required ='';
$short_desc ='';
$meta_description ='';
$meta_keyword ='';
$description ='';
$meta_title ='';
$mrp ='';
$msg='';
$image = '';
$MultipleImageArr=[];
$image_required = 'required';

if(isset($_GET['pi']) && $_GET['pi']>0){
	$pi=get_safe_value($con,$_GET['pi']);
	$deleteRes=mysqli_query($con,"delete from product_images where id='$pi'");
}

if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required = '';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from products where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$category_id=$row['category_id'];
		$sub_category_id=$row['sub_category_id'];
		$name=$row['name'];
		$price=$row['price'];
		$short_desc=$row['short_desc'];
		$meta_description=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$mrp=$row['mrp'];
		$image=$row['image'];

		$resMultipleImages=mysqli_query($con,"select * from product_images
		 where product_id='$id'");
		 if(mysqli_num_rows($resMultipleImages)>0){
			 $i=0;
			 while ($rowMutlipleImages= mysqli_fetch_assoc($resMultipleImages) ) {
				 $multipleImageArr[$i]['product_images']=$rowMutlipleImages['product_images'];
				 $multipleImageArr[$i]['id']=$rowMutlipleImages['id'];
				 $i++;
			 }
		 }
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$category_id=get_safe_value($con,$_POST['category_id']);
    $sub_category_id=get_safe_value($con,$_POST['sub_category_id']);
    $name=get_safe_value($con,$_POST['name']);
    $price=get_safe_value($con,$_POST['price']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $meta_description=get_safe_value($con,$_POST['meta_description']);
    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
    $description=get_safe_value($con,$_POST['description']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $mrp=get_safe_value($con,$_POST['mrp']);

	$res=mysqli_query($con,"select * from products where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}

	if($_FILES['image']['tmp_name']!=''){
		$allowed_types= array(IMAGETYPE_PNG,IMAGETYPE_JPEG);
		$detect_type = exif_imagetype($_FILES['image']['tmp_name']);
		if ($detected = !in_array($detect_type,$allowed_types)){
			$msg = "Please select only png,jpg and jpeg image formats";
		}
	}

	if(!empty(array_filter($_FILES['product_images']['name']))){
		foreach ($_FILES['product_images']['name'] as $key => $val) {
			$fileName= basename($_FILES['product_images']['name'][$key]);
			$targetFilePath = PRODUCT_IMAGE_SERVER_PATH.$fileName;
			$allowed_types= array('jpg','png','jpeg','gif');
			$detect_type = pathInfo($targetFilePath, PATHINFO_EXTENSION);
			if (!in_array($detect_type,$allowed_types)){
				$msg = "Please select only png,jpg and jpeg image formats";
			}
		}
	}

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				mysqli_query($con,"update products set category_id ='$category_id', sub_category_id='$sub_category_id', name='$name', price='$price', image='$image',
            	short_desc='$short_desc', meta_desc='$meta_description', meta_keyword='$meta_keyword', description='$description', 
            	meta_title='$meta_title', mrp='$mrp' where id='$id'");
			}else {
				mysqli_query($con,"update products set category_id ='$category_id', sub_category_id='$sub_category_id', name='$name', price='$price', 
            	short_desc='$short_desc', meta_desc='$meta_description', meta_keyword='$meta_keyword', description='$description', 
            	meta_title='$meta_title', mrp='$mrp' where id='$id'");
			}
			
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"INSERT INTO products (category_id,sub_category_id,name,price,short_desc,meta_desc,meta_keyword,
            description,meta_title,mrp,status,image) VALUES ('$category_id','$sub_category_id','$name', '$price', '$short_desc', '$meta_description', '$meta_keyword', '$description',
            '$meta_title', '$mrp', '1', '$image')");
			$id=mysqli_insert_id($con);
			mysqli_query($con,"insert into product_images (product_id, product_images) values ('$id','$image')");
		}

		/*Product Multiple Images Start*/
		if(isset($_GET['id']) && $_GET['id']!=''){
			foreach ($_FILES['product_images']['name'] as $key => $val) {
				if($_FILES['product_images']['name'][$key]!=''){
					if (isset($_POST['product_images_id'][$key])) {
						$image=rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
						move_uploaded_file($_FILES['product_images']['tmp_name'][$key],PRODUCT_IMAGE_SERVER_PATH.$image);
						mysqli_query($con,"update product_images 
						set product_images='$image' where id='"
						.$_POST['product_images_id'][$key]."'");
					}else {
						$image=rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
						move_uploaded_file($_FILES['product_images']['tmp_name'][$key],PRODUCT_IMAGE_SERVER_PATH.$image);
						mysqli_query($con,"insert into product_images (product_id, product_images) values ('$id','$image')");							
					}
				}
			}
		}else {
			foreach ($_FILES['product_images']['name'] as $key => $val) {
				$image=rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
				move_uploaded_file($_FILES['product_images']['tmp_name'][$key],PRODUCT_IMAGE_SERVER_PATH.$image);
				mysqli_query($con,"insert into product_images (product_id, product_images) values ('$id','$image')");
			}
		}
		/*Product Multiple Images End*/

		header('location:product.php');
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
							<div class="row">
								<div class="col-lg-6">
									<label for="category" class="form-control-label">Category</label>
									<select class="form-control" name="category_id" onChange="get_sub_cat()" id="category_id" required>
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
								<div class="col-lg-6">
									<label for="category" class="form-control-label">Sub-Category</label>
									<select class="form-control" name="sub_category_id" id="sub_category_id" required>
										<option>Select Sub-Category</option>
										
									</select>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label for="product" class="form-control-label">Product-Name</label>
							<input type="text" name="name" placeholder="Enter product's name" class="form-control" required value="<?php echo $name?>">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label for="price" class="form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product's price" class="form-control" required value="<?php echo $price?>">
								</div>
								<div class="col-lg-3">
									<label for="mrp" class="form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter product's mrp" class="form-control" required value="<?php echo $mrp?>">
								</div>
								<div class="col-lg-3">
									<label for="meta keyword" class="form-control-label">Meta Keyword</label>
									<input type="text" name="meta_keyword" placeholder="Enter Meta keyword" class="form-control" required value="<?php echo $meta_keyword?>"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row" id="image_box">
								<div class="col-lg-8">
									<label for="image" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php 
										echo  $image_required?>><?php 
										if ($image!=''){
											echo 
										"<a target='_blank' 
										href='".PRODUCT_IMAGE_SITE_PATH.$image."'><img width='150px'
										src='".PRODUCT_IMAGE_SITE_PATH.$image."'/></a>"; } ?>
								</div>
								<div class="col-lg-4">
									<label for="image" class=" form-control-label"></label>
									<button id="" name="add_images" type="button" 
										class="btn btn-lg btn-info btn-block" onClick="add_more_images()">
										<span id="payment-button-amount">Add More Images</span>
									</button>
								</div>
								<?php
								if(isset($multipleImageArr[0])){
									foreach ($multipleImageArr as $list){
										echo '<div class="col-lg-6" style="margin-top:20px;" id="add_image_box_'.$list['id'].'"><label for="image" class="form-control-label">Image</label>
										<input type="file" name="product_images[]" class="form-control">
										<button type="button" class="btn btn-lg btn-danger btn-block" onClick = remove_image("'.$list['id'].'")>
										<span id="payment-button-amount"><a href="manage_product.php?id='.$id.'&pi='.$list['id'].'" style="color:white;">Remove
										</a></span></button>';
										echo "<a target='_blank' href='".PRODUCT_IMAGE_SITE_PATH.$list['product_images']."'><img width='150px'
										src='".PRODUCT_IMAGE_SITE_PATH.$list['product_images']."'/></a>";
										echo '<input type="hidden" 
										name="product_images_id[]"
										value="'.$list['id'].'"/></div>';
									}
								}
								?>
							</div>
						</div>
                        <div class="form-group">
							<label for="short desc" class="form-control-label">Short Description</label>
							<textarea name="short_desc" placeholder="Enter short desc" class="form-control" required><?php echo $short_desc?></textarea>
						</div>
                        <div class="form-group">
							<label for="meta description" class="form-control-label">Meta Description</label>
							<textarea name="meta_description" placeholder="Enter Meta description" class="form-control" required><?php echo $meta_description?></textarea>
						</div>
                        <div class="form-group">
							<label for="description" class="form-control-label">Description</label>
							<textarea name="description" placeholder="Enter the description" class="form-control" required><?php echo $description?></textarea>
						</div>
                        <div class="form-group">
							<label for="meta title" class="form-control-label">Meta Title</label>
							<textarea name="meta_title" placeholder="Enter meta title" class="form-control" required><?php echo $meta_title?></textarea>
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

<script>
	function get_sub_cat(){
		var category_id = jQuery('#category_id').val();
		jQuery.ajax({
			url:'get_sub_cat.php',
			type:'post',
			data:'category_id='+category_id,
			success:function(result){
				jQuery('#sub_category_id').html(result);
			}
		});
	}
</script>
<?php
require('footer.inc.php');
?> 