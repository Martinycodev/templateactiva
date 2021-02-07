<?php

$hostname='185.224.137.5';
$database='u776344484_activarjonilla';
$username='u776344484_admin';
$password='Arac2021';

$connection=new mysqli($hostname,$username,$password,$database);
if($connection->connect_errno){
	header("Location: https://www.activarjonilla.com", true, 301);
    exit();
}

?>