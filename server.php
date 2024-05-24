<?php 
// prendo i dati e li trasformo in stringhe
$data_string = file_get_contents("dischi.json");
// var_dump($data_string);

// trasformo string in array
$data = json_decode($data_string, true);

// CHANGE PREF
if (isset($_POST["action"]) && $_POST["action"] === "pref_flag") {

$cur_index = $_POST["index"];

$data[$cur_index]["preferred"] = !$data[$cur_index]["preferred"];

file_put_contents("dischi.json", json_encode($data));
}

$response_data = [
    "results" => $data,
];

// trasformo array in string json
$data_list = json_encode($response_data);

header("Content-Type: application/json");

// spedisco la risposta
echo $data_list;