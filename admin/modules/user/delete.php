<?php 
$open ="category";  
require_once __DIR__."/../../autoload/autoload.php";


$id = intval(getInput('id'));



$Editadmin = $db->fetchID("users",$id);
if(empty($Editadmin))
{
  $_SESSION['error'] = " Dữ liệu không tồn tại";
  redirectAdmin("users");
}

$num = $db->delete("users",$id);
if($num > 0)
{
   $_SESSION['success'] = "Xóa thành công ";
              redirectAdmin("user");
}
else
{
   $_SESSION['error'] = "Xóa thất bại ";   // Thêm thất bại 
              redirectAdmin("user"); 
}
?>