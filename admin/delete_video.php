<?php 
include('../myconnect.php');
include('../inc/function.php');
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_ranger'=>1))){
	$id = $_GET['id'];
	$query = "DELETE FROM tblvideo WHERE id={$id}";
	$result = mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location:list_video.php');
}else{
	header('Location:list_video.php');
}

?>