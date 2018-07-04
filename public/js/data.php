<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/06/2018
 * Time: 5:50 CH
 */
$db = new PDO('mysql:host=localhost;dbname=webnews', 'root','');

$stmt = $db->prepare("SELECT * FROM highcharts ORDER BY created ASC");
$stmt->execute();
$json = array();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $json[] = array((string)$created, (int)$amount);
}
echo json_encode($json);
