<?php
$host="127.0.0.1";
$db='attendance_db';
$user='root';
$pass='';
$charset='utf8mb4';


$dsn="mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo= new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );
    //echo 'Database';

}
catch(PDOException $e){
    throw new PDOException($e->getMessage());

}
require_once 'crud.php';
//object of class crud
$crud= new crud($pdo);




?>