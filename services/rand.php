<?php

$receivedData = null;
header("Content-Type: application/json; charset=UTF-8");

if (isset($_POST['data'])) {
    if (!$_POST['data'] == '{}') {
        $receivedData = json_decode($_POST['data'], false);
    }
}

// The next step would be to get a random word from an existing database.
$wordsArray = ['Aleatorio', 'Solución', 'Concurso', 'Visual', 'PHP', 'Lenguaje', 'Cabecera', 'Programación'];
$random = rand(0, count($wordsArray) - 1);
$randomWordFromArray = $wordsArray[$random];

$dataToSend['word'] = $randomWordFromArray;
$output = json_encode($dataToSend);
echo $output;
