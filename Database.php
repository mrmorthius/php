<?php
class Database
{
    public $connection;
    function __construct()
    {
        $dsn = 'mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4;user=root';
        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        // prepare and execute statement
        $statement = $this->connection->prepare($query);
        $statement->execute();

        // fetch result from execution of statement
        return $statement;
    }
}
