<?php

// get
$string = file_get_contents('./db/dischi.json');
$records = json_decode($string, true);

// logic
if(isset($_POST['toggleActive'])){
  $records = $records[$_POST['toggleActive']];
}

if(isset($_POST['searchGenre']) && !empty($_POST['searchGenre'])){
  $records = array_filter($records, fn($record) => $record['genre'] == $_POST['searchGenre']);
}

// send
header ('Content-Type: application/json');
echo json_encode($records);

?>