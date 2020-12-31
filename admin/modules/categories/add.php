<?php 
$open ="categories";  
require_once __DIR__."/../../autoload/autoload.php";

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
  $isset = $db->fetchOne("categories", " name = '" .$data['name']."' ");
  if(count($isset) > 0)
      {
         $_SESSION['error'] = " Tên danh mục đã tồn tại ! ";
      } 
      else
       {
    $id_insert = $db -> insert("categories",$data);
       if($id_insert > 0) 
    {
        $_SESSION['success'] = "Thêm mới thành công ";
       redirectAdmin("categories");
    }
    else
    {
         $_SESSION['error'] = "Thêm mới thất bại ";   // Thêm thất bại  
    }
  }
 }
}
?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
             
             	 
        <div class="container-fluid">
        <h1 style="text-align: center;">Thêm Mới Chuyên Mục</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn" >Admin</li>
            <li class="breadcrumb-item btn">Chuyên Mục</li>
            <li class="breadcrumb-item btn">Thêm Mới</li>
        
        </ol>
        <div class="clearfix">
          
 <?php if(isset($_SESSION['error'] )) : ?>
<div class="alert alert-danger">
    <?php  echo $_SESSION['error']; unset($_SESSION['error']) ?>
</div>
                <?php endif; ?>

          
        </div>
        </div>
                  
             
<dir class="row">
    <dir class="col-sm-8">
       <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên Danh Mục</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Tên danh mục">
        <?php if (isset($error['name'])) : ?>
            <p class="text-danger"><?php echo $error['name'] ?></p> 
        <?php endif ?>
    </div>
    
    <button type="submit" class="btn btn-success">Lưu</button>
</form>

    </dir>
</dir>
                       
 <?php  require_once __DIR__. "/../../layouts/footer.php"; ?>
                     
             