<?php

class ConexionBD
{
    static public function conectarse()
    {
        //Recuerda cambiar la contraseña dependiendo de quien hosteé la conexión
        $bd = new PDO("mysql:host=db;dbname=phpComparador", "root", "root");

        return $bd;
    }
}

?>