<?php

// get
$string = file_get_contents('./db/dischi.json');
$records = json_decode($string, true);

// logic

// send
header ('Content-Type: application/json');
echo json_encode($records);

?>