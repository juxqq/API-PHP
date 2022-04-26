<?php

include('db_connect.php');
global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
        $id = $_GET["id"];
		$name = $_PUT["name"];
		$description = $_PUT["firstName"];
		$price = $_PUT["mail"];
		$category = $_PUT["phone"];
        $password = $_PUT["password"];
		$query="UPDATE users SET Name='".$name."', FirstName='".$description."', MailAdress='".$price."', PhoneNumber='".$category."', Password='".$password."' WHERE id=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de produit. '. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
?>