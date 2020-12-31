<?php 
$open ="categories";  
require_once __DIR__."/../../autoload/autoload.php";


$categories = $db->fetchAll("categories");

?>
<?php  require_once __DIR__. "/../../layouts/header.php"; ?>
             
        <div class="container-fluid">
        
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item btn" >Admin</li>
            <li class="breadcrumb-item btn">Chuyên Mục</li>
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
                            <th rowspan="1" colspan="1">Slug</th>
                            <th rowspan="1" colspan="1">Home</th>
                            <th rowspan="1" colspan="1">Created</th>
                            <th rowspan="1" colspan="1">Active</th>                   
                        </tr>
                    
                    </thead>
                    
                    <tbody>
                        <?php $stt =1 ; foreach($categories as $item): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['slug'] ?></td>
                             <td>
<a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo    $item['home'] == 1 ? 'btn-info' : 'btn-default' ?>">
<?php echo $item['home'] == 1 ? ' Hiển thị' : ' Không ' ?>   
                                </a>
                             </td>
                             <td><?php echo $item['created_at'] ?></td>
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
            </div>
            
    </div>
</div>
    </div>
</div>
                      
 <?php  require_once __DIR__. "/../../layouts/footer.php"; ?>