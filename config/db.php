<?php

class Database{

    public static function connect(){
        $db = new mysqli('localhost','root','','tienda_online');

        $db->query("SET NAME 'utf8'");

        return $db;

    }
}


?>