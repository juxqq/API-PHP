<?php 
include ('db_connect.php');

if(!empty($_GET["mail"]))
			{
				getProduct("MailAdress", $_GET["mail"]);
			}

			if(!empty($_GET["id"]))
			{
				getProduct("Id", $_GET["id"]);
			}

  /*  function getProducts()
	{
		global $conn;
		$query = "SELECT * FROM users";
		$response = array();
		$result = mysqli_query($conn, $query);
        
		while($row = mysqli_fetch_array($result))
		{
            $token = openssl_random_pseudo_bytes(16);
		$token = bin2hex($token);
		$refreshToken = openssl_random_pseudo_bytes(16);
		$refreshToken = bin2hex($token);
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
	}*/
	
	function getProduct($param, $value)
	{
		global $conn;
		$query = "SELECT * FROM users";
		
			$query .= " WHERE ".$param."='".$value. "'";
		
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
				'image' => $row['ImageName'],
                'token' => $token,
                'refreshToken' => $refreshToken
            );
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
?>