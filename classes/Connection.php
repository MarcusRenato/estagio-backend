<?php

class Connection
{
    protected $db;

    public function __construct()
    {
        try {
            $dbname = "produtos";
            $host = "localhost";
            $user = "root";
            $password = "";
            
            $this->db = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERRO: " . $e->getMessage();
            exit;
        }
    }
}
