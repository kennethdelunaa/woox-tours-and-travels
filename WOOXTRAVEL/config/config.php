<?php 

try{
    //HOST
    define('HOST', 'localhost');

    //DATABASE
    define('DBNAME', 'wooxtravel');

    //USER
    define('USER', 'root');

    //PASSWORD
    define('PASS', '');

    $conn = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'', USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // if($conn){
    //     echo 'Connection successfully';
    // }
    // else{
    //     die('Connection error!');
    // }
    }
    catch( PDOException $Exception ){
        echo $Exception->getMessage();
    }
?>