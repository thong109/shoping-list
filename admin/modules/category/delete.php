<?php 
$open ="category";  
require_once __DIR__."/../../autoload/autoload.php";


$id = intval(getInput('id'));



$Editcategory = $db->fetchID("category",$id);
if(empty($Editcategory))
{
  $_SESSION['error'] = " Dữ liệu không tồn tại";
  redirectAdmin("category");
}
/**
* kiểm tra danh mục đã có sản phẩm
*/
$is_product = $db->fetchOne("product","category_id = $id ");
if ($is_product == NULL) 
{
	$num = $db->delete("category",$id);
if($num > 0)
	{
   $_SESSION['success'] = "Xóa thành công ";
              redirectAdmin("category");
	}
else
	{
   $_SESSION['error'] = "Xóa thất bại ";   // Thêm thất bại 
              redirectAdmin("category"); 
	}
}
else
{
	$_SESSION['error'] = "Danh mục đang có sản phẩm ! Không thể xóa	";
	redirectAdmin("category");
}

?>