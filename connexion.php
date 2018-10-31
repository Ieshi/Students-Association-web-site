<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=projetbdd","root","", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>