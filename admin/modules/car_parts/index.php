<?php 
$open ="car_parts";  
require_once __DIR__."/../../autoload/autoload.php";

if (isset($_GET['page']))
{
   $p = $_GET['page'];
}
else
{
    $p = 1;
}
$sql = "SELECT car_parts.*,categories.name as namecate FROM car_parts 
LEFT JOIN categories on categories.id = car_parts.parts_id";

$car_parts = $db->fetchJone("car_parts",$sql,$p,5,true);

if (isset($car_parts['page']))
{
   $sotrang = $car_parts['page'];
   unset($car_parts['page']);
}
?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
             <main>
                  <div class="row">
        <div class="container-fluid">
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn" >Admin</li>
            <li class="breadcrumb-item btn">Tin Tức</li>
            <span class="pull-right"><a href="add.php" class="btn btn-success"><i class="fa fa-plus"></i> Thêm Mới<a></span>
        </ol>
        
                <?php if(isset($_SESSION['success'] )) : ?>
<div class="alert alert-success">
    <?php  echo $_SESSION['success']; unset($_SESSION['success']) ?>
</div>
                <?php endif; ?>

                <?php if(isset($_SESSION['error'] )) : ?>
<div class="alert alert-danger">
    <?php  echo $_SESSION['error']; unset($_SESSION['error']) ?>
</div>
                <?php endif; ?>
</div>
</div> </main>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
        
       
            <div class="col-sm-12 ">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                       
                        <tr>
                            <th rowspan="1" colspan="1">STT</th>
                            <th rowspan="1" colspan="1">Tiêu đề</th>
                            <th rowspan="1" colspan="1">Thứ tự</th>
                            <th rowspan="1" colspan="1">Hình ảnh</th>
                            <th rowspan="1" colspan="1">Nội dung</th>
                            <th rowspan="1" colspan="1">Khác</th>                   
                        </tr>
                    
                    </thead>
                    
                    <tbody>
                        <?php $stt =1 ; foreach($car_parts as $item): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['parts_id'] ?></td>
                            
                            <td>
                                <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="80px" height="80px">
                            </td>
                            <td style="display: -webkit-box;
                                       width: 556px;
                                       line-height: 40px;
                                       overflow: hidden;
                                       text-overflow: ellipsis;
                                       -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;"><?php echo $item['content'] ?></td>
                            <td>
            <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> 
                                    <i class="fa fa-edit"></i>Sửa</a>
            <a class="btn btn-xs btn-danger" href="delete.php?id= <?php echo $item['id'] ?>">
                                    <i class="fa fa-times"></i>Xóa</a>
                            </td>
                           
                        </tr>
                      <?php  $stt++ ; endforeach ?>
                    </tbody>
                </table>

<div class="pull-right">
<nav aria-label="Page navigation" class="clearfix">
    <ul class="pagination">
      

<?php for( $i = 1; $i<= $sotrang; $i++): ?>
    <?php 
    if (isset($_GET['page'])) 
    {
       $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    ?>
    <li class="page-link page-item <?php echo ($i == $p) ? 'active' : ''  ?>">
        
        <a href="?page=<?php echo $i ; ?>"><?php echo $i; ?></a>
    </li>
<?php endfor; ?>
     

    </ul>





</nav>    



</div>





            </div>
           
    </div>
</div>
    </div>
</div>
                      
 <?php  require_once __DIR__. "/../../layouts/footer.php"; ?>