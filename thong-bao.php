
	<?php require_once __DIR__."/autoload/autoload.php"; 
	unset($_SESSION['cart']);
	unset($_SESSION['total']);

	?>
<?php require_once __DIR__."/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
    			<h3 class="title-main"><a href="">Thông báo</a></h3>
    			<!--noi dung-->
    			<?php if(isset($_SESSION['success'])): ?>
    			<div class="alert alert-success">
            <strong style="color: #3c763d">Success!</strong><?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
          </div>
      		  <?php endif ?>
    				
    				
            </section>
            <a href="index.php" class="btn btn-success">Back</a>
        </div>
               
<?php require_once __DIR__."/layouts/footer.php"; ?>
               