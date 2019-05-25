<?php

include "config.php";

$result = array();
$result['error'] = false;
$result['message'] = ' ';
$result['mostVisitedProducts'] = array();
$result['newestGoods'] = array();

$mostVisitedProducts = DB::query("SELECT * FROM product WHERE seen >= 100 ");
if(DB::count()>0){
    $result['mostVisitedProducts'] = $mostVisitedProducts;
}

$now = time();
$oneWeekBefore = $now - (7 * 24 * 60 * 60);

$newestGoods = DB::query("SELECT * FROM product WHERE postedDate BETWEEN '".date("Y-m-d",$oneWeekBefore)."' AND '" . date("Y-m-d" ,$now)."'");
if(DB::count()>0){
    $result['newestGoods'] = $newestGoods;
}

$result['showShareButton'] = true;


echo json_encode($result);