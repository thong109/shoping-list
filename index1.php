<?php 

   require_once __DIR__."/autoload/autoload.php"; 
   $sqlHomecate = "SELECT name , id FROM categories WHERE  home = 1  ORDER BY update_at";
$car_partsHome = $db->fetchsql($sqlHomecate);

$data =[];

foreach ($car_partsHome as $item) {
    $cateId = intval($item['id']);

    $sql = " SELECT * FROM car_parts WHERE parts_id = $cateId ";
    $car_partsHome = $db->fetchsql($sql);
    $data[$item['name']] = $car_partsHome;
}
?>
<?php require_once __DIR__."/layouts/header.php";?>
                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <h3 style="
    font-weight: bold;
    padding: 5px 47px 5px 28px;
    font-size: 18px;
    border-bottom: 2px solid #000000;
    text-transform: uppercase;
    margin-top: 10px;
    margin-bottom: 10px;
    color: white;
    background: #ca0719;
    border-top-right-radius: 10px;">
                            CHUYÊN MỤC</h3>
                        </section>

                        <section class="box-main1">

                            <?php foreach ($data as $key => $value ):?>    
                <h3 class="title-main"><a href=""><?php echo $key ?> </a> </h3>
                        <div class="showitem">                   
                            <?php foreach ($value as $item):?>
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
                            <?php endforeach ?>
                            
                        </section>
                    </div>
                    
                    
              
<?php require_once __DIR__."/layouts/footer.php"; ?>
               