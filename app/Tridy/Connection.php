<?php

namespace Tridy;

class Connection
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($dsn, $user, $pwd, $dbname)
    {
        $this->servername = $dsn;
        $this->username = $user;
        $this->password = $pwd;
        $this->dbname = $dbname;
    }

    public function conn()
    {
        return new \PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    }
}