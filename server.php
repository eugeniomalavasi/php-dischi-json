<?php 
// prendo i dati e li trasformo in stringhe
$data_string = file_get_contents("dischi.json");
// var_dump($data_string);

// trasformo string in array
$data = json_decode($data_string, true);
// var_dump($data);

$response_data = [
    "results" => $data,
];

// trasformo array in string json
$data_list = json_encode($response_data);

header("Content-Type: application/json");

// spedisco la risposta
echo $data_list;