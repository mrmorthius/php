<?php

$heading = "Note";
$config = require('config.php');
$db = new Database($config['database']);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->fetch();
$currentUser = 1;

if (!$note) {
    abort();
}
if ($note['user_id'] !== $currentUser) {
    abort(Response::FORBIDDEN); // Forbidden
}
require("views/note.view.php");
