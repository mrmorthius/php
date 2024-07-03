<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;

if (!$form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors(),
        'email' => $email
    ]);
};

// Match the credentials
$db = App::resolve(Database::class);
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
