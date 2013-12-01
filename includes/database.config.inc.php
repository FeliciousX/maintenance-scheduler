<?php

$username = "ms_user";
$password = "2SuKrqxETJdQhQG2";
$host = "localhost";
$dbname = "ms";


//tell mysql we are using utf8
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND =>
    'SET NAMES utf8'
);

//open connection to mysql
try{
    $db = new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8",
        $username,
        $password,
        $options
    );
}catch (Exception $e){
    die(
        "Failed to connect to the database : " . $e->getMessage()
    );
}
//throw an exception if any error occurs
$db->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
//Always return an associative array for queries
$db->setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC
);
//Disable magic quotes (it creates weird errors
if(function_exists(
        'get_magic_quotes_gpc'
    ) &&
    get_magic_quotes_gpc()
){
    function undo_magic_quotes_gpc(&$array){
        foreach($array as $value){
            if(is_array($value)){
                undo_magic_quotes_gpc($value);
            }else{
                $value = stripslashes($value);
            }
        }
    }

    undo_magic_quotes_gpc($_POST);
    undo_magic_quotes_gpc($_GET);
    undo_magic_quotes_gpc($_COOKIE);
}

//Telling the web browser to use utf-8 encoding
header('Content-Type: text/html; charset=utf-8');

if(!isset($_SESSION))
{
    session_start();
}