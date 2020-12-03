<?php
include_once './config.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$conn = new mysqli(DB_HOST . ':' . DB_PORT, DB_USER, DB_PASSWD, DB_DATABASE);
$databaseArray = array();
$sql = 'SHOW DATABASES;';
$result = $conn->query($sql);
$existAtLeastOneRow = $result->num_rows > 0;
$finalArray = array();

if ($existAtLeastOneRow) {
    while ($row = $result->fetch_array()) {
        array_push($databaseArray, $row['Database']);
    }
    $finalArray['databases'] = $databaseArray;
} else {
    $finalArray['databases'] = 'No se ha realizado la consulta';
}
echo json_encode($finalArray);
