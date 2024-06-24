<?php

$heading = "Note";
$config = require('config.php');
$db = new Database($config['database']);
$currentUser = 1;


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

require("views/note.view.php");
