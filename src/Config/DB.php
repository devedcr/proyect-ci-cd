<?php

namespace App\Config;

use Exception;
use PDO;

class DB
{
    private $user;
    private $pass;
    private $database;
    private $port;
    private $host;
    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->database = $_ENV['DB_DATABASE'];
        $this->port = $_ENV['DB_PORT'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASSWORD'];
    }
    public function getConnection(): PDO | null
    {
        try {
            $db = new PDO("pgsql:host={$this->host};port={$this->port};dbname={$this->database}", $this->user, $this->pass,[
                PDO::ATTR_EMULATE_PREPARES => false,  
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            ]);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (Exception $e) {
            echo "Error Connection Database: {$e->getMessage()}";
            return null;
        }
    }
}
