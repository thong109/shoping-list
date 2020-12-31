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

if ($_SERVER["REQUEST_METHOD"] =="POST")
{
$data =
   [
          "name" => postInput('name'),
          "slug" => str_slug(postInput('name'))
   ];
$error = [];
if(postInput('name') == '')
    {
    $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
    }


if(empty($error))
 {
    $id_update = $db -> update("category",$data,array("id"=>$id));
       if($id_update > 0) 
    {
        $_SESSION['success'] = "Cập nhật thành công ";
       redirectAdmin("category");
    }
    else
    {
         $_SESSION['error'] = "Dữ liệu không thay đổi ";   // Thêm thất bại 
              redirectAdmin("category"); 
    }
 }
}
?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
           
        <div class="container-fluid">
        <h1 style="text-align: center;">Chỉnh Sửa Danh Mục</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn" >Admin</li>
            <li class="breadcrumb-item btn">Danh Sách Danh Mục</li>
            <li class="breadcrumb-item btn">Sửa</li>
        </ol>
        </div>
                  
<dir class="row">
    <dir class="col-sm-8">
       <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên Danh Mục</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Tên danh mục" value="<?php echo $Editcategory['name']?>">
        <?php if (isset($error['name'])) : ?>
            <p class="text-danger"><?php echo $error['name'] ?></p> 
        <?php endif ?>
    </div>
    
    <button type="submit" class="btn btn-success">Lưu</button>
</form>

    </dir>
</dir>
                       
 <?php  require_once __DIR__. "/../../layouts/footer.php"; ?>
                     
             