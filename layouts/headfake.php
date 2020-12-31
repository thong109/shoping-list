
<!DOCTYPE html>
<html>
    <head>
        <title>MaxShop : Đồ án tốt nghiệp</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Chi nhánh miền Trung</a><b>Fast Food</b>
                            </div>
                      <div class="col-md-5">
                              <ul class="list-inline pull-right" id="headermenu">
                    <?php if (isset($_SESSION['name_user'])): ?>
                     <li style=color:#CA0719 ;   >Xin chào : <?php echo $_SESSION['name_user'] ?> </li>
                      <li>
                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
 <ul id="header-submenu">
                  <li><a href="">Thông tin</a></li>
                       <li><a href="gio-hang.php">Giỏ hàng</a></li>
                                <li><a href="dang-xuat.php">Đăng xuất</a></li>
                                   </ul>
                                        </li>
                                       
                                        <?php else : ?>
                                             <li>
                                            <a href="1.php"><i class="fa fa-unlock"></i>Đăng nhập</a>
                                        </li>
                                          <li>
                                            <a href="2.php"><i class="fa fa-user"></i>Đăng ký</a>
                                        </li>
                                        <?php endif ; ?>
                                       
                                        
                                        
                                    </ul>

                                

                            </div>

                        </div>
                        
                    </div>

                </div>
               
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                     <label>
                                        <select name="category" class="form-control">
                                            <option>Tất cả danh mục</option>
                                            <?php foreach ($category as $item): ?>              
                                            <option> 

                                                <?php echo $item['name'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" Tìm kiếm" class="form-control">
                                    <button type="submit" href="tim-kiem.php" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 ">
                            <a href="index.php">
                                <img src="/web_ban_hang/public/uploads/product/bmw.png" height="80px">
                            </a>
                        </div>
                      
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                 <div class="container">
                    <nav>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="index.php">Trang chủ</a>
                            </li>
                            <li>
                                <a href="index.php">MẪU XE </a>
                            <li>
                                <a href="index1.php">TIN TỨC</a>
                            </li>
                            
                            <li>
                                <a href="">CÂU CHUYỆN</a>
                            </li>
                            
                             <li>
                                <a href="hinhanh.php">LIÊN HỆ</a>
                            </li>
                            
                            <li class="pull-right">
                                <a href="">HOTLINE : 0778960401</a>
                            </li>
                           
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"><i class="fa fa-shopping-basket"></i> Giỏ Hàng </a>
                            </ul>
                            </li>
                           
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->       
<div class="w3-content w3-section" style=" height: auto;">
    <img class="mySlides w3-animate-fading" src="<?php echo base_url()?>/public/uploads/product/a.png" style="width:100%">
    <img class="mySlides w3-animate-fading" src="<?php echo base_url()?>/public/uploads/product/G-310-R_1.png" style="width:100%">
    <img class="mySlides w3-animate-fading" src="<?php echo base_url()?>/public/uploads/product/K-1600-B.png" style="width:100%">
    <img class="mySlides w3-animate-fading" src="<?php echo base_url()?>/public/uploads/product/C-400-X_1.png" style="width:100%">
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel,5000);    
}
</script>



          