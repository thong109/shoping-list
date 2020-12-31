<?php 
	require_once __DIR__."/autoload/autoload.php"; 
	$id = intval(getInput('id'));



$Editusers = $db->fetchID("users",$id);

/**
* danh sách danh mục sản phẩm
*/

if ($_SERVER["REQUEST_METHOD"] =="POST")
{
$data =
   [
            "name" => postInput('name'),
            "email" => postInput("email"),
            "phone" => postInput("phone"),
           "password" => postInput("password"),
            "address" => postInput("address")
            
   ];
$error = [];
if(postInput('name') == '')
    {
    $error['name'] = "Mời bạn nhập đầy đủ tên";
    }
if(postInput('email') == '')
    {
    $error['email'] = "Mời bạn nhập email";
    }
    else
    {
      if(postInput("email") != $Editusers['email'])
        {
      $is_check = $db->fetchOne("users", "email = '".$data['email']."'");
      if($is_check != NULL)
      {
        $error['email'] = "Email đã sử dụng";
      }
        }
    }
if(postInput('phone') == '')
    {
    $error['phone'] = "Số điện thoại đã sử dụng";
    }
  

if(postInput('address') == '')
    {
    $error['address'] = "Mời bạn nhập địa chỉ";
    }

if(postInput('password') != NULL && postInput("re_password") != NULL)
{
  if(postInput('password') != postInput("re_password"))
  {
    $error['re_password'] = "Mật khẩu nhập lại không giống";
  }
  else
  {
    $data['password'] = MD5(postInput("password"));
  }
}



if(empty($error))
   {
  
      
   
    $id_update = $db->update("users",$data,array("id"=>$id));
      if($id_update >0) 
      {
       
        $_SESSION['success'] = "Cập nhật thành công ";
        redirectHome("index.php");
      }
       else
      {
         $_SESSION['error'] = "Cập nhật thất bại ";
          redirectHome("index.php");   // Thêm thất bại  
      }
    }
}
?>
<?php require_once __DIR__."/layouts/headfake.php"; ?>            
        <div class="container-fluid">
        <h1 class="mt-2 " style="text-align:center; padding: 5px;font-size: 50px; ">Chỉnh sửa thông tin</h1>
        
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
        <label for="InputEmail3" class="col-sm-2 control-label">Họ và tên</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="InputEmail3" name="name" placeholder="Họ và tên" value="<?php echo $_SESSION['name_user']?>">
        <?php if (isset($error['name'])) : ?>
            <p class="text-danger"><?php echo $error['name'] ?></p> 
        <?php endif ?>
          </div>
      </div>  

      <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="InputEmail3" name="email" placeholder="Email" value="<?php echo $Editusers['email']?>">
        <?php if (isset($error['email'])) : ?>
            <p class="text-danger"><?php echo $error['email'] ?></p> 
        <?php endif ?>
          </div>
      </div>   
      
       <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="InputEmail3" name="phone" placeholder="Số điện thoại" value="<?php echo $Editusers['phone']?>">
        <?php if (isset($error['phone'])) : ?>
            <p class="text-danger"><?php echo $error['phone'] ?></p> 
        <?php endif ?>
          </div>
      </div> 

       <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="InputEmail3" name="password" placeholder="********">
        <?php if (isset($error['password'])) : ?>
            <p class="text-danger"><?php echo $error['password'] ?></p> 
        <?php endif ?>
          </div>
      </div> 

      <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="InputEmail3" name="re_password" placeholder="********">
        <?php if (isset($error['re_password'])) : ?>
            <p class="text-danger"><?php echo $error['re_password'] ?></p> 
        <?php endif ?>
          </div>
      </div> 

        <div class="form-group">
        <label for="InputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="InputEmail3" name="address" placeholder="Địa chỉ" value="<?php echo $Editusers['address']?>">
        <?php if (isset($error['address'])) : ?>
            <p class="text-danger"><?php echo $error['address'] ?></p> 
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

                       

<?php require_once __DIR__."/layouts/footer.php"; ?> 