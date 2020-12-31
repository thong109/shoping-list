<?php 

	require_once __DIR__. "/autoload/autoload.php"; 


 	$id = intval(getInput('id'));

    $EditCategory = $db -> fetchID("category",$id);
    if( empty($EditCategory))	
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
       
    }
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $data =
        [
            "name"=> postInput('name')
        ];
        $error = [];

        if(postInput('name')== '')
        {
            $error['name'] = "Mời bạn nhập đầy đủ  ";
        }


        if(empty($error))
        {

            if($EditCategory['name'] != $data['name'])
            {
                $isset= $db-> fetchOne("category"," name = '".$data['name']."' ");
                if(count($isset)>0)
                {
                   $_SESSION['success'] = " Tìm thấy ! ";
                } 
             	else
                {
                   
                    $_SESSION['error'] ="không tìm thấy! ";
                }
    }

?>