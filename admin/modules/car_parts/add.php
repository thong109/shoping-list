<?php 
$open ="car_parts";  
require_once __DIR__."/../../autoload/autoload.php";



/**
* danh sách danh mục sản phẩm
*/
$categories = $db->fetchAll("categories"); 
if ($_SERVER["REQUEST_METHOD"] =="POST")
{
$data =
   [
          "name" => postInput('name'),
          "slug" => str_slug(postInput("name")),
          "parts_id" => postInput("parts_id"),
          "content" => postInput("content")
   ];
$error = [];
if(postInput('name') == '')
    {
    $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
    }
if(postInput('parts_id') == '')
    {
    $error['parts_id'] = "Mời bạn chọn tên danh mục";
    }
if(postInput('content') == '')
    {
    $error['content'] = "Mời bạn nhập mô tả";
    }
if (! isset($_FILES['thunbar'])) 
    {
    $error['thunbar'] = "Mời bạn chèn hình ảnh";
    } 
if(empty($error))
   {
  if (isset($_FILES['thunbar']))
      {
  $file_name = $_FILES['thunbar']['name'];
  $file_tmp = $_FILES['thunbar']['tmp_name'];
  $file_type = $_FILES['thunbar']['type'];
  $file_erro = $_FILES['thunbar']['error'];
  if ($file_erro == 0) 
          {
   $part = ROOT . "car_parts/";
   $data['thunbar'] = $file_name;
          }
      }  
      
   
    $id_insert = $db->insert("car_parts",$data);
      if($id_insert) 
      {
        move_uploaded_file($file_tmp, $part.$file_name);
        $_SESSION['success'] = "Thêm mới thành công ";
        redirectAdmin("car_parts");
      }
       else
      {
         $_SESSION['error'] = "Thêm mới thất bại ";
          redirectAdmin("car_parts");   // Thêm thất bại  
      }
    }
}
?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
             
        
        <div class="container-fluid">
        <h1 style="text-align: center;">Thêm Mới Tin Tức</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn" >Admin</li>
            <li class="breadcrumb-item btn">Tin Tức</li>
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
       
        

<dir class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
     

       <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Danh Mục Tin Tức</label>
          <div class="col-sm-8">
            <select class="form-control col-md-8" name="parts_id">
               <option value="">--Mời bạn chọn danh mục </option>
                  <?php foreach ($categories as $item ): ?>
       <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
       <?php endforeach ?>
            </select>
        <?php if (isset($error['parts_id'])) : ?>
            <p class="text-danger"><?php echo $error['parts_id'] ?></p> 
        <?php endif ?>
          </div>
      </div>  



      <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Tên Tin Tức</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="InputEmail3" name="name" placeholder="Tên...." >
        <?php if (isset($error['name'])) : ?>
            <p class="text-danger"><?php echo $error['name'] ?></p> 
        <?php endif ?>
          </div>
      </div>  
       

       <div class="form-group">
     
        <label for="InputEmail3" class="col-sm-1 control-label">Hình Ảnh</label>
          <div class="col-sm-3">
            <input type="file" class="form-control" id="InputEmail3" name="thunbar">
                <?php if (isset($error['thunbar'])) : ?>
                     <p class="text-danger"><?php echo $error['thunbar'] ?></p> 
                <?php endif ?>
          </div>
      </div>  

      <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Nội Dung</label>
          <div class="col-sm-8">
           <textarea class="form-control" name="content" rows="4"></textarea>
        <?php if (isset($error['content'])) : ?>
            <p class="text-danger"><?php echo $error['content'] ?></p> 
        <?php endif ?>
          </div>
      </div>  


    <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Lưu</button>      
            </div>
   
    </div>
    
  </form>

</dir>

                       
 <?php  require_once __DIR__. "/../../layouts/footer.php"; ?>