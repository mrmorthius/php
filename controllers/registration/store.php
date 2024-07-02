<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

//verify the form input
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password must be at least 7 characters";
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
        'email' => $email
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();


if (!is_bool($user)) {
    $errors['email'] = "E-mail already exists";

    return view('registration/create.view.php', [
        'errors' => $errors,
        'email' => $email
    ]);
}

$db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
]);

$_SESSION['user'] = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find()['email'];

header("Location: /notes");
die();
    
//check if email already exists
    //if yes redirect to login

    //if no then create account and log user in and redirect