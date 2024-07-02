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

//check if email already exists
$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

//if yes redirect to login
//if no then create account and log user in and redirect

if ($user) {
    //redirect to login (will come)
    header("Location: /");
    exit();
} else {


    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => $password
    ]);

    // mark that user is logged in
    $_SESSION['user'] = [
        'email' => $email
    ];

    header("Location: /");
    exit();
}
