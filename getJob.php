<?php 
include ('db_connect.php');


		global $conn;
		$query = "SELECT * FROM emploi";
		if(!empty($_GET['loc']) && !empty($_GET['intitule'])) {
			$query = "SELECT * FROM emploi WHERE Localisation='{$_GET['loc']}' AND Intitule='{$_GET['intitule']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['remuneration'])) {
			$query = "SELECT * FROM emploi WHERE Localisation='{$_GET['loc']}' AND Remuneration='{$_GET['remuneration']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['typeContrat'])) {
			$query = "SELECT * FROM emploi WHERE Localisation='{$_GET['loc']}' AND TypeContrat='{$_GET['typeContrat']}'";
		}
		else if(!empty($_GET['intitule']) && !empty($_GET['remuneration'])) {
			$query = "SELECT * FROM emploi WHERE Intitule='{$_GET['intitule']}' AND Remuneration='{$_GET['remuneration']}'";
		}
		else if(!empty($_GET['intitule']) && !empty($_GET['typeContrat'])) {
			$query = "SELECT * FROM emploi WHERE Intitule='{$_GET['intitule']}' AND TypeContrat='{$_GET['typeContrat']}'";
		}
		else if(!empty($_GET['typeContrat']) && !empty($_GET['remuneration'])) {
			$query = "SELECT * FROM emploi WHERE TypeContrat='{$_GET['typeContrat']}' AND Remuneration='{$_GET['remuneration']}'";
		}
		else if(!empty($_GET['intitule']) && !empty($_GET['remuneration']) && !empty($_GET['loc'])) {
			$query = "SELECT * FROM emploi WHERE Intitule='{$_GET['intitule']}' AND Remuneration='{$_GET['remuneration']}' AND Localisation='{$_GET['loc']}'";
		}
		else if(!empty($_GET['intitule']) && !empty($_GET['remuneration']) && !empty($_GET['typeContrat'])) {
			$query = "SELECT * FROM emploi WHERE Intitule='{$_GET['intitule']}' AND Remuneration='{$_GET['remuneration']}' AND TypeContrat='{$_GET['typeContrat']}'";
		}
		else if(!empty($_GET['intitule']) && !empty($_GET['typeContrat']) && !empty($_GET['loc'])) {
			$query = "SELECT * FROM emploi WHERE Intitule='{$_GET['intitule']}' AND TypeContrat='{$_GET['typeContrat']}' AND Localisation='{$_GET['loc']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['remuneration']) && !empty($_GET['typeContrat'])) {
			$query = "SELECT * FROM emploi WHERE Localisation='{$_GET['loc']}' AND Remuneration='{$_GET['remuneration']}' AND TypeContrat='{$_GET['typeContrat']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['remuneration']) && !empty($_GET['typeContrat']) && !empty($_GET['intitule'])) {
			$query = "SELECT * FROM emploi WHERE Localisation='{$_GET['loc']}' AND Remuneration='{$_GET['remuneration']}' AND TypeContrat='{$_GET['typeContrat']}' AND Intitule='{$_GET['intitule']}'";
		}
		else if(!empty($_GET['intitule'])) {
			$query = "SELECT * FROM emploi WHERE Intitule='{$_GET['intitule']}'";
		}
		else if(!empty($_GET['loc'])) {
			$query = "SELECT * FROM emploi WHERE Localisation='{$_GET['loc']}'";
		}
		else if(!empty($_GET['typeContrat'])) {
			$query = "SELECT * FROM emploi WHERE TypeContrat='{$_GET['typeContrat']}'";
		}
		else if(!empty($_GET['remuneration'])) {
			$query = "SELECT * FROM emploi WHERE Remuneration='{$_GET['remuneration']}'";
		}

		
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = array(
                'intitule' => $row['Intitule'],
                'description' => $row['Description'],
                'typeContrat' => $row['TypeContrat'],
                'remuneration' => $row['Remuneration'],
                'assoc' => $row['Assoc'],
				'adresse' => $row['Adresse'],
                'cp'=> $row['Cp'],
                'ville'=>$row['Ville']
            );
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
		
?>