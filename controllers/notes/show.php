<?php

$config = require base_path('config.php');
$db = new Database($config['database']);
$currentUser = 1;


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

view("notes/show.view.php", [
    'heading' => "Note",
    'note' => $note
]);
