<?php 
include('../myconnect.php');
include('../inc/function.php');
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_ranger'=>1))){
	$id = $_GET['id'];
	// Xóa hình ảnh trong uploads
	$sql = "SELECT anh FROM tblslider WHERE id={$id}";
	$query_a = mysqli_query($dbc,$sql);
	$anhInfo = mysqli_fetch_assoc($query_a);
	
	unlink('../'.$anhInfo['anh']);

	$query = "DELETE FROM tblslider WHERE id={$id}";
	$result = mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location:list_slider.php');
}else{
	header('Location:list_slider.php');
}

?>