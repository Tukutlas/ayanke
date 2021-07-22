<?php
require('top.inc.php');
$name='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from category where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['category'];
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

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update category set category='$name' where id='$id'");
		}else{
			mysqli_query($con,"insert into category (category,status) values('$name', '1')");
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
				<form method="post">
					<div class="card-body card-block">
						<div class="form-group">
							<label for="category" class="form-control-label">Category</label>
							<input type="text" name="name" placeholder="Enter category's name" class="form-control" required value="<?php echo $name?>">
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