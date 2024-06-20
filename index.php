<?php

require('functions.php');
// require("router.php");
require('Database.php');

$db = new Database();
$posts = $db->query('SELECT * FROM posts WHERE 1=1')->fetchAll(PDO::FETCH_ASSOC);
