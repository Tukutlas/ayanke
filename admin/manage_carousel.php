<?php
require('top.inc.php');
$main_heading='';		
$sub_heading='';
$btn_txt='';
$btn_link='';
$image_required = 'required';
$image = '';
$msg='';


if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required = '';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from carousel where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$main_heading=$row['main_heading'];
        $sub_heading=$row['sub_heading'];
        $btn_txt=$row['btn_txt'];
        $btn_link=$row['btn_link'];
    }else{
		header('location:carousel.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$main_heading=get_safe_value($con,$_POST['main_heading']);
    $sub_heading=get_safe_value($con,$_POST['sub_heading']);
    $btn_txt=get_safe_value($con,$_POST['btn_txt']);
    $btn_link=get_safe_value($con,$_POST['btn_link']);
	$res=mysqli_query($con,"select * from carousel where main_heading='$main_heading'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Slider already exist";
			}
		}else{
			$msg="Slider already exist";
		}
	}

    if($_FILES['image']['tmp_name']!=''){
		$allowed_types= array(IMAGETYPE_PNG,IMAGETYPE_JPEG);
		$detect_type = exif_imagetype($_FILES['image']['tmp_name']);
		if ($detected = !in_array($detect_type,$allowed_types)){
			$msg = "Please only png,jpg and jpeg image formats";
		}
	}

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],SLIDER_IMAGE_SERVER_PATH.$image);
			    mysqli_query($con,"update carousel set main_heading='$main_heading',sub_heading='$sub_heading',	
                btn_txt='$btn_txt', btn_link='$btn_link',image='$image' where id='$id'");
		    } else{
                mysqli_query($con,"update carousel set main_heading='$main_heading',sub_heading='$sub_heading',	
                btn_txt='$btn_txt', btn_link='$btn_link' where id='$id'");
		    }
	    }else {
            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],SLIDER_IMAGE_SERVER_PATH.$image);
            mysqli_query($con,"INSERT INTO carousel (main_heading,sub_heading,btn_txt,btn_link,
            image,status) VALUES ('$main_heading','$sub_heading','$btn_txt', '$btn_link','$image','1')");
        }
        header('location:carousel.php');
        die();
    }
}

?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
				<div class="card-header"><strong>Carousel</strong><small> Form</small></div>
				<form method="post" enctype="multipart/form-data">
					<div class="card-body card-block">
						<div class="form-group">
							<label for="main-heading" class="form-control-label">Main-Heading</label>
							<input type="text" name="main_heading" placeholder="Enter Main-Heading" class="form-control" required value="<?php echo $main_heading?>">
						</div>
                        <div class="form-group">
							<label for="sub-heading" class="form-control-label">Sub-Heading</label>
							<input type="text" name="sub_heading" placeholder="Enter Sub-Heading" class="form-control" required value="<?php echo $sub_heading?>">
						</div>
                        <div class="form-group">
							<label for="btn-txt" class="form-control-label">Btn-Txt</label>
							<input type="text" name="btn_txt" placeholder="Enter Btn Txt" class="form-control" required value="<?php echo $btn_txt?>">
						</div>
                        <div class="form-group">
							<label for="btn-link" class="form-control-label">Btn-Link</label>
							<input type="text" name="btn_link" placeholder="Enter Btn Link" class="form-control" required value="<?php echo $btn_link?>">
						</div>
                        <div class="form-group">
							<label for="image" class="form-control-label">Image</label>
							<input type="file" name="image" placeholder="" class="form-control" required value="<?php echo $image_required?>"><?php 
								if ($image!=''){
									echo 
								"<a target='_blank' 
							href='".PRODUCT_IMAGE_SITE_PATH.$image."'><img width='150px'
							src='".PRODUCT_IMAGE_SITE_PATH.$image."'/></a>"; } ?>
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