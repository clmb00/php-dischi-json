<?php

// get
$string = file_get_contents('./db/dischi.json');
$records = json_decode($string, true);

// logic
if(isset($_GET['toggleActive'])){
  $records = $records[$_GET['toggleActive']];
}

if(isset($_GET['searchGenre']) && !empty($_GET['searchGenre'])){
  $records = array_filter($records, fn($record) => $record['genre'] == $_GET['searchGenre']);
}

if(isset($_POST['author']) && isset($_POST['genre']) && isset($_POST['title']) && isset($_POST['poster']) && isset($_POST['year'])){
  $record = [
    'author' => $_POST['author'],
    'genre' => $_POST['genre'],
    'poster' => $_POST['poster'],
    'title' => $_POST['title'],
    'year' => $_POST['year']
  ];
  $records[] = $record;
  file_put_contents('./db/dischi.json', json_encode($records));
}

if(isset($_POST['deleteRecord'])){
  foreach($records as $key => $record) {
    if($record['title'] == $_POST['deleteRecord']){
      $index = $key;
    }
  }
  array_splice($records, $index, 1);
  file_put_contents('./db/dischi.json', json_encode($records));
}

// send
header ('Content-Type: application/json');
echo json_encode($records);

?>