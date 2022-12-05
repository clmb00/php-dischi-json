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

if(isset($_POST['title'])){
  $record = [
    'author' => $_POST['author'],
    'genre' => $_POST['genre'],
    'poster' => $_POST['poster'],
    'title' => $_POST['title'],
    'year' => $_POST['year'],
  ];
  $records[] = $record;
  file_put_contents('./db/dischi.json', json_encode($records));
}

if(isset($_POST['deleteRecord'])){
  array_splice($records, $_POST['deleteRecord'], 1);
  file_put_contents('./db/dischi.json', json_encode($records));
}

// send
header ('Content-Type: application/json');
echo json_encode($records);

?>