<?php include('../myconnect.php'); 
// kiem tra xem ket qua tra ve co dung hay khong
if (!function_exists('kt_query')) {
  function kt_query($result,$query){
    global $dbc;
    if(!$result){
      die("QUERY ".$query." \n<br/> MYSQL Error ".mysqli_error($dbc));
    }
  }
}

// kiểm tra title
if (!function_exists('check_title')) {
    // ... proceed to declare your function
  function check_title($title)
  {
    global $dbc;
    $sql = "SELECT * FROM tblvideo WHERE title='{$title}'";
    $result = mysqli_query($dbc,$sql);
    kt_query($result,$sql);
    return mysqli_num_rows($result);
  }
}
if (!function_exists('upload_img')) {
  function upload_img($img,$uploads){
      if ((($_FILES[$img]["type"] == "image/gif")
      || ($_FILES[$img]["type"] == "image/jpeg")
      || ($_FILES[$img]["type"] == "image/pjpeg")
      || ($_FILES[$img]["type"] == "image/jpg")
      || ($_FILES[$img]["type"] == "image/png"))
      && ($_FILES[$img]["size"] < 20000)
      && (strlen($_FILES[$img]["name"]) < 51)){
         if ($_FILES[$img]["error"] > 0){
             echo "Return Code: " . $_FILES[$img]["error"];
         }
         else{
             // echo "Upload: " . $_FILES["image"]["name"] . "<br />";
             // echo "Type: " . $_FILES["image"]["type"] . "<br />";
             // echo "Size: " . ($_FILES["image"]["size"] / 1024) . " Kb<br />";
             //  echo "Temp file: " . $_FILES["image"]["tmp_name"] . "<br />";

             if (file_exists(THEME_DIR."/".$uploads."/" . $_FILES[$img]["name"])){
                 echo $_FILES[$img]["name"] . " already exists. ";
             }
             else{
                 move_uploaded_file($_FILES[$img]["tmp_name"],THEME_DIR."/".$uploads."/"  . $_FILES[$img]["name"]);
                 return THEME_DIR."/".$uploads."/"  . $_FILES[$img]["name"];
             }
         }
     }
  }
}