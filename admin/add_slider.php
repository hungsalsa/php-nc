<?php ob_start();session_start(); ?>
<?php include('includes/header.php') ?>
<?php include('../inc/images_helper.php') ?>

<?php 
include('../inc/function.php');
// Lấy slider nếu sửa
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_ranger'=>1))){
	$id = $_GET['id'];
	$sql = "SELECT * FROM tblslider WHERE id={$id}";

	$query = mysqli_query($dbc,$sql);

	// kt_query($dbc,$query);
	if(mysqli_affected_rows($dbc)){
		$row_edit = mysqli_fetch_assoc($query);
	}else {
		header('Location:list_slider.php');
	}


}
$target_dir = "../uploads/";
// Them moi slider
if ($_SERVER['REQUEST_METHOD']=='POST'){
// echo '<pre>';print_r($_POST);
	$errors =array();
	if(empty($_POST['title'])){
		$errors['title'] = 'Tiêu đề đang để trống';
	}else{
		$title = trim($_POST['title']);
	}

	// if(empty($_POST['link'])){
	// 	$errors['link'] = 'link';
	// }else{
	// 	$link = trim($_POST['link']);
	// }
	
	if($_POST['ordernum']==''){
		$errors['number'] = 'number';
	}else{
		$ordernum = $_POST['ordernum'];
	}

	// Upload ảnh
	$img = $_FILES['anh']['name'];
	$image_up = new upload_img($img,'uploads');
	
	// Nếu không lỗi
	if(empty($errors)){

		$title = trim($_POST['title']);
		// $anh = $image;
		$link = trim($_POST['link']);
		$ordernum = $_POST['ordernum'];
		$status = $_POST['status'];

		if($_POST['submit'] == 'Cập nhật'){
		if($_FILES["anh"]["name"] ==''){
			$image = $row_edit['anh'];
		}
			
			$query = "UPDATE tblslider SET title='{$title}',";
				$query .="anh='{$image}',link='{$link}',ordernum=$ordernum,status=$status WHERE id=".$_GET['id'];

		// }
			// $query = "UPDATE tblslider SET title='{$title}',";
			// if (isset($_FILES['anh']['tmp_name'])){
			// 	$query .="anh='{$image}',link='{$link}',ordernum=$ordernum,status=$status WHERE id=".$_GET['id'];
			// }
			
		}else{
			$query = "INSERT INTO tblslider(title,anh,anh_thumb,link,ordernum,status) VALUES('{$title}','{$image}','{$thumb}','{$link}',$ordernum,$status)";
		}

		$result = mysqli_query($dbc,$query);
		kt_query($result,$query);

		if(mysqli_affected_rows($dbc) == 1){
			if($_POST['submit'] == 'Cập nhật'){
				$message = "<p class='required'>Cập nhật thành công slider {$title}</p>";
			}else{
				$message = "<p class='required'>Thêm mới thành công slider {$title}</p>";
			}
			if(isset($message)){
				$_SESSION['message']= $message;
				header('Location:list_slider.php');
			}
		}else{
			
			$message = "<p class='required'>Thêm mới không thành công slider</p>";
		}
		
		
	}else{
		$message = "<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
	}
}
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		 
		<form name="frmadd_slider" method="POST" enctype="multipart/form-data">
			
			<?php if (isset($message)): ?>
				<div class="alert alert-danger" role="alert">
				  <?= $message.'<br/>' ?>
				  <?php foreach ($errors as $value): ?>
				  	<p><?= $value ?></p>
				  <?php endforeach ?>
				</div>
			<?php endif ?>

			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item active" aria-current="page"><?= (isset($id))?'Sửa slider : '.$row_edit['title']:'Thêm mới slider' ?></li>
			  </ol>
			</nav>

			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control <?php if(isset($errors['title'])) echo 'not-invalid'; ?>" placeholder="Tiêu đề" value="<?= (isset($id))? $row_edit['title']:'';?> <?=  (isset($_POST['submit']))? $_POST['title']:''; ?>">
				<?php if (isset($errors['title'])): ?>
				<div class="invalid-feedback">
			        <?php if ($errors['title']=='empty'): ?>
			        	Tiêu đề không được để trống
			        <?php else: ?>
			        	<?= $errors['title'] ?>
			        <?php endif ?>
			    </div>
				<?php endif ?>
			</div>

			<div class="form-group">
				<label>Ảnh đại diện</label>
				<input type="file" name="anh" class="form-control <?php if(isset($errors['anh'])) echo 'not-invalid'; ?>" placeholder="Ảnh đại diện" value="<?= (isset($id))? $row_edit['anh']:''; ?><?=  (isset($_POST['submit']))? $_POST['anh']:''; ?>">
				<?php if (isset($id)): ?>
					<img src="../<?= $row_edit['anh'] ?>" style="max-height: 90px">
				<?php endif ?>

				<?php if (isset($errors['anh'])): ?>
				<div class="invalid-feedback">
			        <?php if ($errors['anh']=='empty'): ?>
			        	<?= $errors['anh'] ?>
			        <?php else: ?>
			        	<?= $errors['anh'] ?>
			        <?php endif ?>
			    </div>
				<?php endif ?>
			</div>
			

			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" class="form-control <?php if(isset($errors['link'])) echo 'not-invalid'; ?>" placeholder="Link slider" value="<?= (isset($id))? $row_edit['link']:''; ?><?=  (isset($_POST['submit']))? $_POST['link']:''; ?>">
				<?php if (isset($errors['link'])): ?>
				<div class="invalid-feedback">
			        Link không được để trống
			    </div>
				<?php endif ?>
			</div>
			

			<div class="form-group">
				<label>Thứ tự</label>
				<input type="number" name="ordernum" class="form-control <?php if(isset($errors['number'])) echo 'not-invalid'; ?>" placeholder="Number" value="<?= (isset($id))? $row_edit['ordernum']:''; ?><?=  (isset($_POST['submit']))? $_POST['ordernum']:''; ?>">
				<?php if (isset($errors['number'])): ?>
				<div class="invalid-feedback">
			        Thứ tự không được để trống
			    </div>
				<?php endif ?>
			</div>
			<div class="form-group">
				<label style="display: block;">Trạng thái</label>
				<label class="radio-inline"><input type="radio" name="status" value="1" <?=  (isset($_POST['submit']) && $_POST['status']==1)? 'checked="checked"':''; ?> <?= (isset($id) && $row_edit['status']==1)?'checked="checked"':'' ?> checked="checked">Hiển thị</label>
				<label class="radio-inline"><input type="radio" name="status" value="0" <?=  (isset($_POST['submit']) && $_POST['status']==0)? 'checked="checked"':''; ?><?= (isset($id) && $row_edit['status']==0)?'checked="checked"':'' ?>>Không hiển thị</label>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="<?= (!isset($id)) ? 'Thêm mới':'Cập nhật'; ?>">
			<a href="list_slider.php"><button type="button" name="button" class="btn btn-primary" style="padding: 6px 34px;">   Hủy   </button></a>
		</form>
	</div>

</div>
<?php include('includes/footer.php') ?>
<?php ob_flush() ?>