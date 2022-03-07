<?php 
//Used to connect the database

 $server ='localhost';
 $user = 'root';
 $psw = '';
 $db = 'jehan_example_system';

 $connect = mysqli_connect($server,$user,$psw,$db);

 if(!$connect){
     echo("Connection Error!");
 }

?>