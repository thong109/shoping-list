<?php 
$open ="product";  
require_once __DIR__."/../../autoload/autoload.php";

if (isset($_GET['page']))
{
   $p = $_GET['page'];
}
else
{
    $p = 1;
}
$sql = "SELECT product.*,category.name as namecate FROM product 
LEFT JOIN category on category.id = product.category_id";

$product = $db->fetchJone("product",$sql,$p,5,true);

if (isset($product['page']))
{
   $sotrang = $product['page'];
   unset($product['page']);
}
?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
             <main>
                  <div class="row">
        <div class="container-fluid">
        
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn" >Admin</li>
            <li class="breadcrumb-item btn">Sản phẩm</li>
            <span class="pull-right"><a href="add.php" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới<a></span>
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
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Category</th>
                            <th rowspan="1" colspan="1">Slug</th>
                            <th rowspan="1" colspan="1">Thunbar</th>
                            <th rowspan="1" colspan="1">Infor</th>
                            <th rowspan="1" colspan="1">Active</th>                   
                        </tr>
                    
                    </thead>
                    
                    <tbody>
                        <?php $stt =1 ; foreach($product as $item): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['category_id'] ?></td>
                            <td><?php echo $item['slug'] ?></td>
                            <td>
                                <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="80px" height="80px">
                            </td>
                            <td>
                                    <ul>
                                        <li>Giá : <?php echo $item['price']?> </li>
                                        <li>Số lượng : <?php echo $item['number']?></li>
                                    </ul>
                            </td>
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