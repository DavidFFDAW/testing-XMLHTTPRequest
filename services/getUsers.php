<?php

$receivedData = null;
header("Content-Type: application/json; charset=UTF-8");

if (isset($_POST['data'])){
    if (!$_POST['data'] == '{}'){
        $receivedData = json_decode($_POST['data'], false);
    }
}
$queryElementsArray = array();
$connection = new mysqli('localhost','root','','');
$sql = "SHOW DATABASES;";
$queryResult = $connection->query($sql);

while($fetched = $queryResult->fetch_array()){
    array_push($queryElementsArray,$fetched['Database']);
}
$dataToSend['db'] = $queryElementsArray;
$connection->close();
unset($connection);
$output = json_encode($dataToSend);
echo $output;
