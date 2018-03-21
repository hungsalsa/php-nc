<?php ob_start();session_start(); ?>
<?php include('includes/header.php') ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<?php 
			if ($_SERVER['REQUEST_METHOD']=='POST'){

				$errors =array();
				if(empty($_POST['title'])){
					$errors['title'] = 'empty';
				}else{
					$title = trim($_POST['title']);
				}
				
				if(empty($_POST['link'])){
					$errors['link'] = 'link';
				}else{
					$link = trim($_POST['link']);
				}
				
				if($_POST['ordernum']==''){
					$errors['number'] = 'number';
				}else{
					$ordernum = $_POST['ordernum'];
				}

				if(empty($errors)){

					$title = trim($_POST['title']);
					$link = trim($_POST['link']);
					$ordernum = $_POST['ordernum'];
					$status = $_POST['status'];

					if($_POST['submit'] == 'Cập nhật'){
						$query = "UPDATE tblvideo SET title='{$title}',link='{$link}',ordernum=$ordernum,status=$status WHERE id=".$_GET['id'];
					}else{
						$query = "INSERT INTO tblvideo(title,link,ordernum,status) VALUES('{$title}','{$link}',$ordernum,$status)";
					}

					$result = mysqli_query($dbc,$query);
					kt_query($result,$query);

					

					if(mysqli_affected_rows($dbc) == 1){
						if($_POST['submit'] == 'Cập nhật'){
							$message = "<p class='required'>Cập nhật thành công video {$title}</p>";
						}else{
							$message = "<p class='required'>Thêm mới thành công video {$title}</p>";
						}
						if(isset($message)){
							$_SESSION['message']= $message;
						}
						header('Location:list_video.php');
					}else{
						
						$message = "<p class='required'>Thêm mới không thành công</p>";
					}
					
					
				}else{
					$message = "<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
				}
			}
		 ?>

		 <!-- SUA VIDEO -->
		<?php 
			if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_ranger'=>1))){
				$id = $_GET['id'];
				$query = "SELECT * FROM tblvideo WHERE id={$id}";

				$result = mysqli_query($dbc,$query);

				kt_query($result,$query);
				$row_edit = mysqli_fetch_assoc($result);
				if(!empty($row_edit)){
					$title = $row_edit['title'];
					$link = $row_edit['link'];
					$ordernum = $row_edit['ordernum'];
					$status = $row_edit['status'];
				}
				
			}
		 ?>
		<form name="frmadd_video" method="POST">
			
			<?php if (isset($message)): ?>
				<div class="alert alert-danger" role="alert">
				  <?= $message ?>
				</div>
			<?php endif ?>

			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item active" aria-current="page"><?= (isset($_GET['id']))?'Sửa video : '.$title:'Thêm mới video' ?></li>
			  </ol>
			</nav>

			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control <?php if(isset($errors['title'])) echo 'not-invalid'; ?>" placeholder="Title" value="<?= (isset($title))? $title:''; ?>">
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
				<label>Link</label>
				<input type="text" name="link" class="form-control <?php if(isset($errors['link'])) echo 'not-invalid'; ?>" placeholder="Link" value="<?= (isset($link))? $link:''; ?>">
				<?php if (isset($errors['link'])): ?>
				<div class="invalid-feedback">
			        Link không được để trống
			    </div>
				<?php endif ?>
			</div>
			

			<div class="form-group">
				<label>Thứ tự</label>
				<input type="number" name="ordernum" class="form-control <?php if(isset($errors['number'])) echo 'not-invalid'; ?>" placeholder="Number" value="<?= (isset($ordernum))? $ordernum:''; ?>">
				<?php if (isset($errors['number'])): ?>
				<div class="invalid-feedback">
			        Thứ tự không được để trống
			    </div>
				<?php endif ?>
			</div>
			<div class="form-group">
				<label style="display: block;">Trạng thái</label>
				<label class="radio-inline"><input type="radio" name="status" value="1" <?= (isset($_POST['status']) && $_POST['status']==1)?'checked="checked"':'' ?> checked="checked">Hiển thị</label>
				<label class="radio-inline"><input type="radio" name="status" value="0" <?= (isset($_POST['status']) && $_POST['status']==0)?'checked="checked"':'' ?>>Không hiển thị</label>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="<?= (!isset($_GET['id'])) ? 'Thêm mới':'Cập nhật'; ?>">
			<a href="list_video.php"><button type="button" name="button" class="btn btn-primary" style="padding: 6px 34px;">   Hủy   </button></a>
		</form>
	</div>

</div>
<?php include('includes/footer.php') ?>
<?php ob_flush() ?>