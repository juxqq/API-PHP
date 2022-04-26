<?php

include('db_connect.php');
        $name = $_POST["name"];
		$firstName = $_POST["firstName"];
		$phone = $_POST["phone"];
		$mail = $_POST["mail"];
	    $password = $_POST["password"];
		$image = $_POST["image"];
	    $query="INSERT INTO users(Name, FirstName, PhoneNumber, MailAdress, Password, ImageName) VALUES('".$name."', '".$firstName."', '".$phone."', '".$mail."', '".$password."', '".$image."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Utilisateur ajout� avec succ�s.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);h
?>