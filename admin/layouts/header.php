<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang Admin</title>
        <link href="<?php echo base_url() ?>public/admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> 
    </head>
    <body class="sb-nav-fixed">
       
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url() ?>admin">Admin Page</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
             <!-- Navbar Search--> 
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
              
            </form>
            <!-- Navbar--> 

            <ul class="navbar-nav ml-auto ml-md-0">
                
                <a class="nav-item dropdown">
                     <a class="nav-link" href="http://localhost/ban/"  ><i class="fas fa-home"></i></a> 
                    <a class="nav-link"  href="login.php"  ><i class="fa fa-power-off" ></i></a> 
                   
                </a>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="<?php echo base_url() ?>admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Bảng điều khiển </a>
            <a class="nav-link <?php echo isset($open) && $open == 'category' ? 'active': '' ?>" href="<?php echo modules("category")?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-list">  </i></div>Danh mục sản phẩm</a>
            <a class="nav-link <?php echo isset($open) && $open == 'product' ? 'active': '' ?>" href="<?php echo modules("product")?>">
                         <div class="sb-nav-link-icon"><i class="fa fa-database">  </i></div>  Sản phẩm </a>   
            <a class="nav-link <?php echo isset($open) && $open == 'user' ? 'active': '' ?>" href="<?php echo modules("user")?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-user">  </i></div>  Thành viên </a>  
            <a class="nav-link <?php echo isset($open) && $open == 'feedback' ? 'active': '' ?>" href="<?php echo modules("feedback")?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-rss">  </i></div>Liên Hệ</a> 
            <a class="nav-link <?php echo isset($open) && $open == 'admin' ? 'active': '' ?>" href="<?php echo modules("admin")?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle">  </i></div>  Admin </a> 
                            
            <a class="nav-link <?php echo isset($open) && $open == 'car_parts' ? 'active': '' ?>" href="<?php echo modules("car_parts")?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle">  </i></div>Tin tức</a>

            <a class="nav-link <?php echo isset($open) && $open == 'categories' ? 'active': '' ?>" href="<?php echo modules("categories")?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle">  </i></div>Chuyên mục</a>

 <a class="nav-link <?php echo isset($open) && $open == 'transaction' ? 'active': '' ?>" href="<?php echo modules("transaction")?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle">  </i></div>Mục vận chuyển</a>
                              
                            
            </nav>
        </div>
        <div id="layoutSidenav_content">
       
      