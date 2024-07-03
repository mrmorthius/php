<?php

$_SESSION = [];
session_destroy();

// get cookie params
$params = session_get_cookie_params();

// delete cookie
setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

header('Location: /');
die();
