<?php
    require_once __DIR__."/autoload/autoload.php";

    $data =
    [     
      'email' => postInput("email"),
      'password' =>(postInput("password"))      
    ];

    $error = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    if ($data['email'] == '')
      {
        $error['email'] = "Bạn chưa nhập tên email !!! ";
      }
    if ($data['password'] == '')
      {
        $error['password'] = "Bạn chưa nhập mật khẩu !!! ";
      }
      if (empty($error))
      {
        $is_check = $db->fetchOne("users","email = '".$data['email']."' AND password = '".md5($data['password'])."' ");
          if($is_check !=NULL)
                    {
                        $_SESSION['name_user'] = $is_check['name'];
                        $_SESSION['name_id'] = $is_check['id'];
                        echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";
                    }
                    else
                    {
                        $_SESSION['error'] = "Đăng nhập thất bại";
                    }
      }
    }


 ?>
 <style>
  body
  {
    background: url(/web_ban_hang/public/frontend/images/4.jpg);
    background-size: cover; 
  }
</style>

    <link rel="stylesheet" type="text/css" media="screen" href="/web_ban_hang/public/admin/css/style.css">
    <section>
        <div class="container">
            <div class="form_content">
                <h2>What is Lorem Ipsum</h2>
                <p>............</p>
                    <a href="#">Read More</a>
            </div>
            <div class="login_form">
                <h3 class="title-main">Đăng nhập</h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">


<?php if (isset($_SESSION['success'])):?>
          <div class="alert alert-success">
            <strong style="color: #3c763d">Success!</strong><?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
          </div>
        <?php endif ?>

            <?php if (isset($_SESSION['error'])):?>
                <div class="alert alert-danger">
                    <strong style="color:red">Error!</strong><?php echo $_SESSION['error'] ; unset($_SESSION['error']) ?>
                </div>
            <?php endif ?>

                  <div class="form-group">
          <label class="col-md-2 col-md-offset-1">Email</label>
          <div class="col-md-8">
            <input type="email" name="email" placeholder="Email" class="form-control">
            <?php if (isset($error['email'])): ?>
              <p class="text-danger"><?php echo $error['email'] ?></p>
            <?php endif ?>  

          </div>
        </div>

                   <div class="form-group">
          <label class="col-md-2 col-md-offset-1">Mật khẩu</label>
          <div class="col-md-8">
            <input type="password" name="password" placeholder="*********" class="form-control">
            <?php if (isset($error['password'])): ?>
              <p class="text-danger"><?php echo $error['password'] ?></p>
            <?php endif ?>
          </div>
        </div>
                    <input type="submit" name="" value="Đăng nhập">
                    <span>Bạn chưa có tài khoản ? Hãy  <a href="2.php"> đăng ký</a> ngay!!!</span>
                </form>
               
            </div>
        </div>
    </section>
