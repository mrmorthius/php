<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email";
}

if (!Validator::string($password)) {
    $errors['password'] = "Please provide a valid password";
}

if (!empty($errors)) {
    return view('sesssion/create.view.php', [
        'errors' => $errors,
        'email' => $email
    ]);
}
// Match the credentials
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if ($user) {
    // Log in the user if the credentials match
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('Location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => "No matching account found for that email address and password"
    ]
]);
