<?php
include "../config.php";

$result = array();
$result['error'] = false;
$result['message'] = '';
$result['data'] = '[]';

$data = DB::query("SELECT * FROM category");
if(DB::count>0){
    $result['data'] = $data;
}

echo json_encode($result);
