<?php
$conn = new mysqli('localhost', 'root', '', '');
$sql = 'SHOW DATABASES';

$readDatabases = $conn->query($sql);

$databaseArray = array();
while ($dbRow = $readDatabases->fetch_array()) {
    array_push($databaseArray, $dbRow['Database']);
};
$finalArray['database'] = $databaseArray;
$dataToSend = json_encode($finalArray);
echo $dataToSend;
