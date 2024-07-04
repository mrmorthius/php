<?php

namespace Core;

use Core\Database;
use Core\App;

class Authenticator
{
    protected $user = [];

    public function attempt($email, $password)
    {
        $this->user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ])->find();

        if ($this->user) {
            // Log in the user if the credentials match
            if (password_verify($password, $this->user['password'])) {
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        // get cookie params
        $params = session_get_cookie_params();

        // delete cookie
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
