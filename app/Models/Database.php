<?php

namespace MyApp\Models;

use \PDO;

class Database
{
    private $host = "127.0.0.1";
    private $name = "projet5";
    private $user = "root";
    private $pass = "";
    private static $connexion;

    function __construct($host = null, $name = null, $user = null, $pass = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->name = $name;
            $this->user = $user;
            $this->pass = $pass;
        }

        try {
            self::$connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
                $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8MB4',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

        } catch (PDOException $e) {
            echo 'Erreur : impossible de se connecter à la base de donnée';
        }
    }

    public function connect()
    {
        return self::$connexion;
    }
}

$DBB = new Database();
$DB = $DBB->connect();

