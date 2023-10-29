<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/* @autor Marcelo Dueñas */
class Database
{
    private $host = 'localhost';
    private $dbname = 'MYPROJECT_development';
    private $username = 'marcelo';
    private $password = '30011996';
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p><b>Successful database connection.</b></p>";
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->db;
    }
}
