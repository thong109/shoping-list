<?php 
	require_once __DIR__."/autoload/autoload.php"; 
	$id = intval(getInput('id'));


//chi tiết sản phẩm
	$car_parts = $db->fetchID("car_parts",$id);


	$cateid = intval($car_parts['parts_id']);

	$sql = "SELECT * FROM car_parts WHERE parts_id = $cateid ORDER BY ID DESC LIMIT 4";
	$sanphamkemtheo = $db->fetchsql($sql);




?>
<?php require_once __DIR__."/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="<?php echo uploads() ?>product/<?php echo $car_parts['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    <li><h3><?php echo $car_parts['name'] ?></h3></li>
                                  <h2><?php echo $car_parts['created_at'] ?></h2>
                                   	<p style="font-size: 30px; color:red;font-weight: bold;">Nội dung</p>
                                    <h1 style="font-size:16px;font-family: Arial,sans-serif;"><?php echo $car_parts['content'] ?></h1>       	
                               </ul>
                            </div>

            </section>
                

                <div class="col-md-12 ">
                    <h1>Tin khác</h1>
                	 <div class="showitem">                   
                            <?php foreach ($sanphamkemtheo as $item):?>
                                <div class="col-md-3 item-car_parts bor">
                                    <a href="chi-tiet-phu-tung.php?id=<?php echo $item['id'] ?>">
                <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="90%" height="180">
                                    </a>
                                    <div class="info-item">
                                   <a href="chi-tiet-phu-tung.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        <p><div class="content"><?php echo $item['content'] ?></div></p>
                                    </div>
                <div class="hidenitem">
                    <p><a href="chi-tiet-phu-tung.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                    <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div> 
                            <?php endforeach ?>
                        </div>
                </div>
        </div>
               
<?php require_once __DIR__."/layouts/footer.php"; ?>              