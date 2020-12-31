<?php 
$open ="categories";  
require_once __DIR__."/../../autoload/autoload.php";


$id = intval(getInput('id'));


$Editcategories = $db->fetchID("categories",$id);
if(empty($Editcategories))
{
  $_SESSION['error'] = " Dữ liệu không tồn tại";
  redirectAdmin("categories");
}



$home = $Editcategories['home'] == 0 ? 1 :0;

$update = $db->update("categories",array("home" => $home), array("id" => $id));
  if($update > 0) 
    {
        $_SESSION['success'] = "Cập nhật thành công ";
       redirectAdmin("categories");
    }
    else
    {
         $_SESSION['error'] = "Dữ liệu không thay đổi ";   // Thêm thất bại 
              redirectAdmin("categories"); 
    }








 ?>