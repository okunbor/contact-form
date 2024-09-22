<?php

require_once("header.php");

require_once("db.php");

if (isset($_POST["submit"])) {

    # code...
$db = New DB();
$fN  = $_POST["firstname"] ;
$lN = $_POST["lastname"];
$age = $_POST["age"];
$email = $_POST["email"];

$db->conn();

$db->prepareInsert($fN , $lN, $age, $email);



$db->close();



  


    
}


require_once("footer.php");




?>