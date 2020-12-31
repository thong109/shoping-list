
<?php 
		require_once __DIR__."/autoload/autoload.php";
		$con = mysqli_connect("localhost","root","","web-ban-hang");
		if(isset($_SESSION['name_id']))
		{
		echo "<script>alert('Bạn đã có tài khoản');location.href='index.php'</script>";
		}
		$data =
		[
			'name' => postInput("name"),
			'email' => postInput("email"),
			'password' =>(postInput("password")),
			'phone' =>postInput("phone"),
			'address' => postInput("address")
			
			
		];
		$error = [];
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			if ($data['name'] == '')
			{
				$error['name'] = "Bạn chưa nhập tên !!! ";
			}

				
			if ($data['email'] == '')
			{
				$error['email'] = "Bạn chưa nhập tên email !!! ";
			}

		
			if ($data['password'] == '')
			{
				$error['password'] = "Bạn chưa nhập mật khẩu !!! ";
			}
			else
			{
				$data['password'] = MD5(postInput("password"));
			}

				if ($data['phone'] == '')
			{
				$error['phone'] = "Bạn chưa nhập số điện thoại !!! ";
			}

			 	if ($data['address'] == '')
			{
				$error['address'] = "Bạn chưa nhập địa chỉ !!! ";
			}

			//kiểm tra mảng error
			if (empty($error)) 
			{
				$idinsert = $db->insert("users",$data);
				if ($idinsert > 0 )
				{
				  
				  echo "<script>alert('Đăng ký thành công , hãy đăng nhập');location.href='1.php'</script>";
				}
				else
				{
					
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

  <link rel="stylesheet" type="text/css" media="screen" href="/web_ban_hang/public/admin/css/styless.css">
    <section>
        <div class="container">
            <div class="form_content">
                <h2>MoTo Việt Nam</h2>
                <p>............</p>
                    <a href="#">Xem thêm</a>
            </div>
            <div class="login_form">
                <h3 class="title-main">Đăng ký</h3>
                <p>Vui lòng điền thông tin để đăng ký</p>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">

<div class="form-group">
    			<label class="col-md-2 col-md-offset-1">Tên người dùng</label>
    			<div class="col-md-8">
    				<input type="text" name="name" placeholder="Họ và tên" class="form-control" value="<?php echo $data['name'] ?>">
    				<?php if (isset($error['name'])): ?>
    					<p class="text-danger"><?php echo $error['name'] ?></p>
    				<?php endif ?>	
    			</div>
    		</div>

<div class="form-group">
    			<label class="col-md-2 col-md-offset-1">Email</label>
    			<div class="col-md-8">
    				<input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $data['email'] ?>">
    				<?php if (isset($error['email'])): ?>
    					<p class="text-danger"><?php echo $error['email'] ?></p>
    				<?php endif ?>	
    			</div>
    		</div>

<div class="form-group">
    			<label class="col-md-2 col-md-offset-1">Mật khẩu</label>
    			<div class="col-md-8">
    				<input type="password" name="password" placeholder="*********" class="form-control" value="<?php echo $data['password'] ?>">
    				<?php if (isset($error['password'])): ?>
    					<p class="text-danger"><?php echo $error['password'] ?></p>
    				<?php endif ?>
    			</div>
    		</div>

<div class="form-group">
    			<label class="col-md-2 col-md-offset-1">Điện thoại</label>
    			<div class="col-md-8">
    				<input type="number" name="phone" placeholder="Điện thoại" class="form-control" min="0" value="<?php echo $data['phone'] ?>">
    				<?php if (isset($error['phone'])): ?>
    					<p class="text-danger"><?php echo $error['phone'] ?></p>
    				<?php endif ?>
    			</div>
    		</div>

<div class="form-group">
    			<label class="col-md-2 col-md-offset-1">Địa chỉ</label>
    			<div class="col-md-8">
    				<input type="text" name="address" placeholder="Địa chỉ " class="form-control" value="<?php echo $data['address'] ?>">
    				<?php if (isset($error['address'])): ?>
    					<p class="text-danger"><?php echo $error['address'] ?></p>
    				<?php endif ?>	
    			</div>
    		</div>

 <input type="submit" name="" value="Đăng ký">
<p>Bạn đã có tài khoản rồi? <a href="1.php">Đăng nhập</a>.</p>
</div>


</form>

