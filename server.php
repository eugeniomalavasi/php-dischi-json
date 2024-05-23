<?php 
// prendo i dati e li trasformo in stringhe
$data_string = file_get_contents("dischi.json");
// var_dump($data_string);

// trasformo string in array
$data = json_decode($data_string, true);
// var_dump($data);
if (isset($_POST["pref_update"])) {
$liked_album = $_POST["pref_update"];

$album_data = [
    "title" => $liked_album["title"],
    "author" => $liked_album["author"],
    "year" => $liked_album["year"],
    "poster" => $liked_album["poster"],
    "genre" => $liked_album["genre"],
    "preferred" => false,
];

$data = $album_data;

}

$response_data = [
    "results" => $data,
];

// trasformo array in string json
$data_list = json_encode($response_data);

header("Content-Type: application/json");

// spedisco la risposta
echo $data_list;