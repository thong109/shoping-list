<?php 
$open ="transaction";  
require_once __DIR__."/../../autoload/autoload.php";

if (isset($_GET['page']))
{
   $p = $_GET['page'];
}
else
{
    $p = 1;
}
$sql = "SELECT transaction.*, users.name as nameuser, users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC ";
$sql1 = "SELECT transaction.*, product.name as nameproduct,product.price as priceproduct FROM transaction LEFT JOIN product ON product.id = transaction.product_id ORDER BY ID DESC ";
$transaction = $db->fetchJone("transaction",$sql,$p,5,true);

if (isset($transaction['page']))
{
   $sotrang = $transaction['page'];
   unset($transaction['page']);
}
?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
             <main>
                  <div class="row">
        <div class="container-fluid">
        
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn">Admin</li>
            <li class="breadcrumb-item btn">Danh mục vận chuyển</li>
            
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
                            <th rowspan="1" colspan="1">Phone</th>
                              
                            <th rowspan="1" colspan="1">Status</th>  
                            <th rowspan="1" colspan="1">Active</th>   
                               
                        </tr>
                    
                    </thead>
                    
                    <tbody>
                        <?php $stt =1 ; foreach($transaction as $item): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['nameuser'] ?></td>
                            <td><?php echo $item['phoneuser'] ?></td>
                          
                            <td>
                                <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-info' ?>"><?php echo $item['status'] ==0 ? 'Chưa xử lý ...' : 'Đã xử lý' ?></a>
                            </td>
                           
                          
                           
                            
                            <td>
          
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