<?php 
$open ="admin";  
require_once __DIR__."/../../autoload/autoload.php";



/**
* danh sách danh mục sản phẩm
*/
$data =
   [
            "name" => postInput('name'),
            "email" => postInput("email"),
            "phone" => postInput("phone"),
            "password" => MD5(postInput("password")),
            "address" => postInput("address"),
            "level" => postInput("level")
   ];
if ($_SERVER["REQUEST_METHOD"] =="POST")
{

$error = [];
if(postInput('name') == '')
    {
    $error['name'] = "Mời bạn nhập đầy đủ tên admin";
    }
if(postInput('email') == '')
    {
    $error['email'] = "Mời bạn nhập email";
    }
    else
    {
      $is_check = $db->fetchOne("admin", "email = '".$data['email']."'");
      if($is_check !=NULL)
      {
        $error['email'] = "Email đã sử dụng";
      }
    }
if(postInput('phone') == '')
    {
    $error['phone'] = "Số điện thoại đã sử dụng";
    }
     else
    {
      $is_check = $db->fetchOne("admin", "phone = '".$data['phone']."'");
      if($is_check !=NULL)
      {
        $error['phone'] = "Số điện thoại đã sử dụng";
      }
    }
if(postInput('password') == '')
    {
    $error['password'] = "Mời bạn nhập mật khẩu";
    }
if(postInput('address') == '')
    {
    $error['address'] = "Mời bạn nhập địa chỉ";
    }

if($data['password'] != MD5(postInput("re_password")))
{
  $error['password'] = "Mật khẩu nhập lại không giống";
}



if(empty($error))
   {
  
      
   
    $id_insert = $db->insert("admin",$data);
      if($id_insert) 
      {
       
        $_SESSION['success'] = "Thêm mới thành công ";
        redirectAdmin("admin");
      }
       else
      {
         $_SESSION['error'] = "Thêm mới thất bại ";
          redirectAdmin("admin");   // Thêm thất bại  
      }
    }
}
?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
             
        
        <div class="container-fluid">
        <h1 style="text-align: center;">Thêm Mới Admmin</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn" >Admin</li>
            <li class="breadcrumb-item btn">Danh Sách Admin</li>
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
        <label for="InputEmail3" class="col-sm-2 control-label">Họ Và tên</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="InputEmail3" name="name" placeholder="Họ và tên" value="<?php echo $data['name']?>">
        <?php if (isset($error['name'])) : ?>
            <p class="text-danger"><?php echo $error['name'] ?></p> 
        <?php endif ?>
          </div>
      </div>  


      <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="InputEmail3" name="email" placeholder="Email" value="<?php echo $data['email']?>">
        <?php if (isset($error['email'])) : ?>
            <p class="text-danger"><?php echo $error['email'] ?></p> 
        <?php endif ?>
          </div>
      </div>   
      
       <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Số Điện Thoại</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="InputEmail3" name="phone" placeholder="Số điện thoại" value="<?php echo $data['phone']?>">
        <?php if (isset($error['phone'])) : ?>
            <p class="text-danger"><?php echo $error['phone'] ?></p> 
        <?php endif ?>
          </div>
      </div> 

       <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Mật Khẩu</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="InputEmail3" name="password" placeholder="********">
        <?php if (isset($error['password'])) : ?>
            <p class="text-danger"><?php echo $error['password'] ?></p> 
        <?php endif ?>
          </div>
      </div> 

      <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Nhập Lại Mật Khẩu</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="InputEmail3" name="re_password" placeholder="********" required="">
        <?php if (isset($error['re_password'])) : ?>
            <p class="text-danger"><?php echo $error['re_password'] ?></p> 
        <?php endif ?>
          </div>
      </div> 

        <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Địa Chỉ</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="InputEmail3" name="address" placeholder="Địa chỉ" value="<?php echo $data['address']?>">
        <?php if (isset($error['address'])) : ?>
            <p class="text-danger"><?php echo $error['address'] ?></p> 
        <?php endif ?>
          </div>
      </div>  
     
        <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Level</label>
          <div class="col-sm-8">
            <select class="form-control" name="level">
              <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selcted'": ''?>>CTV</option>
              <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selcted'": ''?>>Admin</option>
            </select>
        <?php if (isset($error['level'])) : ?>
            <p class="text-danger"><?php echo $error['level'] ?></p> 
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