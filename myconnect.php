<?php 
// kết nối csdl
$dbc = mysqli_connect('localhost','root','','thietkeweb');

if(!$dbc){
	echo 'Ket noi khong thanh cong';
}else{
	mysqli_set_charset($dbc,'utf8');
}

?>