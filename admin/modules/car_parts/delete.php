<?php 
$open ="car_parts";  
require_once __DIR__."/../../autoload/autoload.php";


$id = intval(getInput('id'));



$Editcar_parts = $db->fetchID("car_parts",$id);
if(empty($Editcar_parts))
{
  $_SESSION['error'] = " Dữ liệu không tồn tại";
  redirectAdmin("car_parts");
}

$num = $db->delete("car_parts",$id);
if($num > 0)
{
   $_SESSION['success'] = "Xóa thành công ";
              redirectAdmin("car_parts");
}
else
{
   $_SESSION['error'] = "Xóa thất bại ";   // Thêm thất bại 
              redirectAdmin("car_parts"); 
}
?>