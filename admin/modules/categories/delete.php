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
/**
* kiểm tra danh mục đã có sản phẩm
*/
$is_car_parts = $db->fetchOne("car_parts","parts_id = $id ");
if ($is_car_parts == NULL) 
{
	$num = $db->delete("categories",$id);
if($num > 0)
	{
   $_SESSION['success'] = "Xóa thành công ";
              redirectAdmin("categories");
	}
else
	{
   $_SESSION['error'] = "Xóa thất bại ";   // Thêm thất bại 
              redirectAdmin("categories"); 
	}
}
else
{
	$_SESSION['error'] = "Danh mục đang có sản phẩm ! Không thể xóa	";
	redirectAdmin("categories");
}

?>