<?php 
require_once __DIR__."/autoload/autoload.php";

$category = $db->fetchAll("category");
	if(!isset($_SESSION['login'])){
		header('location:login.php');
	}


?>
<?php  require_once __DIR__. "/layouts/header.php"; ?>
             <main>
             	  <div class="row">
        <div class="container-fluid">
            
        <img src="/shop-do-an-nhanh/public/uploads/product/2.png" alt="" style="margin-top: 10px; margin-left: 490px;">
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item">Chào Mừng</li>
        </ol>
</div>

</div> </main>
                       
 <?php  require_once __DIR__. "/layouts/footer.php"; ?>
                     
             