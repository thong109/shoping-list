<?php 
session_start();
require_once __DIR__."/../libraries/Database.php";
require_once __DIR__."/../libraries/Function.php";
$db = new Database;


define("ROOT", $_SERVER['DOCUMENT_ROOT']."/web_ban_hang/public/uploads/");






$category = $db->fetchAll("category");
$categories = $db->fetchAll("categories");



/** lấy danh sách sản phẩm mới**/
$sqlNew = "SELECT * FROM  product WHERE 1 ORDER BY ID DESC LIMIT 3";
$sqlNew1 = "SELECT * FROM  car_parts WHERE 1 ORDER BY ID DESC LIMIT 3";
$productNew = $db->fetchsql($sqlNew);
$car_partsNew = $db->fetchsql($sqlNew1);
?>