<?php session_start(); ?>
<?php include('includes/header.php') ?>

<?php if (isset($_SESSION['message'])): ?>
	<div class="alert alert-danger" role="alert">
	  <?= $_SESSION['message']; ?>
	</div>
<?php endif ?>
<?php unset($_SESSION['message']); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách video</li>
	<a href="add_video.php" style="float: right;"><span class="glyphicon glyphicon-plus" style="font-size: 24px">Addvideo</span></a>
  </ol>
</nav>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tiêu đề</th>
      <th scope="col">Link</th>
      <th scope="col">Thứ tự</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
	<?php 
	$query = "SELECT * FROM tblvideo ORDER BY ordernum DESC";
	$result = mysqli_query($dbc,$query);
	kt_query($result,$query);
	?>
	<?php if (mysqli_num_rows($result)): ?>
		<?php while ($row = mysqli_fetch_assoc($result)):?>
			
    <tr>
      <td scope="row"><?= $row['id'] ?></td>
      <td scope="row"><?= $row['title'] ?></td>
      <td scope="row"><?= $row['link'] ?>
	<?php 
		// $link =  $row['link'];
		// $link =  str_replace("watch?v=","embed/",$row['link']);
	?>

      	<!-- <iframe width="150" height="115" src="<?= $link ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->

	</td>
      <td scope="row"><?= $row['ordernum'] ?></td>
      <td scope="row"><?= $row['status'] ?></td>
      <td>
      	<a href="add_video.php?id=<?= $row['id'] ?>" title=" Sửa "><i style="font-size:24px" class="action fa">&#xf044;</i></a> <i style="font-size:26px;color: #34b733;" class="glyphicon glyphicon-resize-horizontal"></i>
      	<a onclick="return confirm('Bạn có muốn xóa không ?')" href="delete_video.php?id=<?= $row['id'] ?>" title=" Xóa "><i style="font-size:24px" class="action fa">&#xf014;</i></a>
      </td>
    </tr>
		<?php endwhile; ?>
    
	<?php endif ?>
  </tbody>
</table>

<?php include('includes/footer.php') ?>
