<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = 1;


$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_GET['id']
]);
header("Location: /notes");
exit();
