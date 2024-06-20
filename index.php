<?php

require('functions.php');
// require("router.php");
require('Database.php');
$config = require('config.php');

$db = new Database($config['database']);
$posts = $db->query('SELECT * FROM posts WHERE 1=1')->fetchAll(PDO::FETCH_ASSOC);
dd($posts);
