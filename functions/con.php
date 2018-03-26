<?php
define('date', date('d-m-Y'));
class Config
{
    public function connection()
    {
        $host    = '127.0.0.1';
        $db_user = 'movie_database';
        $db_pass = 'dbms_project';
        $db_name = 'movie_database';
        
        $db = new mysqli($host, $db_user, $db_pass, $db_name);
        if ($db->connect_error) {
            die('Could Not Connect: ' . $db->connect_error);
        }
        return $db;
    }
}
?>