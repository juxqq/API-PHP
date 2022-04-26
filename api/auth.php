<?php

include('db_connect.php');
$request_method = $_SERVER["REQUEST_METHOD"];
global $conn;

switch($request_method)
	{
		case 'GET':
            if(!empty($_GET["mail"]))
			{
				getUser("MailAdress", $_GET["mail"]);
			}
			if(!empty($_GET["id"]))
			{
				getUser("Id", $_GET["id"]);
			}
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		case 'POST':
            addUser();
			break;
		case 'PUT':
			echo('put');
			break;
	}

    function getUser($param, $value)
	{
		global $conn;
		$query = "SELECT * FROM users WHERE ".$param."='".$value. "'";
		$response = array();
		$result = mysqli_query($conn, $query);
        $token = openssl_random_pseudo_bytes(16);
		$token = bin2hex($token);
		$refreshToken = openssl_random_pseudo_bytes(16);
		$refreshToken = bin2hex($token);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = array(
                'id' => $row['Id'],
                'name' => $row['Name'],
                'firstName' => $row['FirstName'],
                'phoneNumber' => $row['PhoneNumber'],
                'mail' => $row['MailAdress'],
				'password' => $row['Password'],
                'token' => $token,
                'refreshToken' => $refreshToken
            );
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

    function addUser() {
        $name = $_POST["name"];
		$firstName = $_POST["firstName"];
		$phone = $_POST["phone"];
		$mail = $_POST["mail"];
	    $password = $_POST["password"];
	    $query="INSERT INTO users(Name, FirstName, PhoneNumber, MailAdress, Password) VALUES('".$name."', '".$firstName."', '".$phone."', '".$mail."', '".$password."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Utilisateur ajouté avec succès.'
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
		echo json_encode($response);
    }

    function updateUser() {
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
    }
?>