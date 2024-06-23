<?php

$config = require('config.php');
$db = new Database($config['database']);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->fetch();
$heading = "Note ID: " . $note['id'];

require("views/note.view.php");
