<?php
/**
 * usng mysqli_connect for database connection
 */

 $databaseHost = 'localhost';
 $databaseName = 'crud_db';
 $databaseUser = 'root';
 $databasePass = '';

 $mysqli = mysqli_connect($databaseHost, $databaseUser, $databasePass, $databaseName);
 
 if(!$mysqli){
    die("Connection failed");
 }
 ?>
 