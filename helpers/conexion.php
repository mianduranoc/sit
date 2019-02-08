<?php

class ConexionBD{
    public $server = "sittepic.tech";
    public $username="root";
    public $password="Equipo_GPS*26112018";
    public $basededatos = "sit";
    public $db;

    function __construct(){
        $this->db= mysqli_connect($this->server, $this->username, $this->password, $this->basededatos);
        mysqli_query($this->db, "SET NAMES 'utf8'");
        if (!isset($_SESSION)){
            session_start();
        }
    }
    function getConnection(){
        return $this->db;
    }
    function close(){
        mysqli_close($this->db);
    }

}


