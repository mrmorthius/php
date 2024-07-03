<?php

namespace Http\Forms;

use Core\Validator;
use Core\Database;
use Core\App;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = "Please provide a valid email";
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = "Please provide a valid password";
        }
        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
