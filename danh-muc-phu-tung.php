<?php 
		require_once __DIR__."/autoload/autoload.php";
		$id = intval(getInput('id'));
		$Editcategories = $db->fetchID("categories",$id);
		if(isset($_GET['p']))
		{
			$p = $_GET['p'];
		}
		else
		{
			$p = 1;
		}
		$sql = " SELECT * FROM car_parts WHERE parts_id = $id";

		$total = count($db->fetchsql($sql));

		$car_parts = $db->fetchJones("car_parts",$sql,$total,$p,12,true);
		$sotrang = $car_parts['page'];
 		unset($car_parts['page']);

 		$path = $_SERVER['SCRIPT_NAME'];
 ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
    			<h3 class="title-main"><a href=""><?php echo $Editcategories['name'] ?></a></h3>  			
    			    <div class="clearfix showitem">
    			    	<?php foreach ($car_parts as $item): ?>
    			    		<div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-phu-tung.php?id=<?php echo $item['id'] ?>">
                <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                    <a href="chi-tiet-phu-tung.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        <p><div class="content"><?php echo $item['content'] ?></div></p>
                                    </div>
                
                       		</div>
    			    	<?php endforeach ?>
                      
                    </div>
                        <nav class="text-center">
                        	<ul class="pagination">
                        	<?php for ($i=1; $i <= $sotrang; $i++) :?>
                        	<li class="<?php echo isset($_GET['p']) && $_GET['p' ==$i ? 'active' : '']?>"><a href="<?php echo $path?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                        	<?php endfor ; ?>
                        	</ul>
                        </nav>

                          <!--noi dung-->     
            </section>
        </div>
               
<?php require_once __DIR__."/layouts/footer.php"; ?>
               