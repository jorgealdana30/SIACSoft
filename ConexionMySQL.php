<?php

class ConexionMySQL
{
    private $sql;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'siacsoft';

    public function __construct()
    {
        $this->sql = new mysqli($this->host ,$this->user,$this->pass,$this->bd);
        $this->sql->query("SET NAMES 'utf8'");
        if ($this->sql->connect_errno){
            echo "<script type='text/javascript'>alert('No se ha podido realizar la conexión a la Base de Datos.');
                  </script>";
        }
    }

    public function getSql()
    {
        return $this->sql;
    }
}