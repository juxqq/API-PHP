<?php 
include ('db_connect.php');


		global $conn;
		$query = "SELECT * FROM evenement";
		if(!empty($_GET['loc']) && !empty($_GET['publicVise'])) {
			$query = "SELECT * FROM evenement WHERE Localisation='{$_GET['loc']}' AND publicVise='{$_GET['publicVise']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['description'])) {
			$query = "SELECT * FROM evenement WHERE Localisation='{$_GET['loc']}' AND description='{$_GET['description']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['datePublication'])) {
			$query = "SELECT * FROM evenement WHERE Localisation='{$_GET['loc']}' AND datePublication='{$_GET['datePublication']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['nom'])) {
			$query = "SELECT * FROM evenement WHERE Localisation='{$_GET['loc']}' AND nom='{$_GET['nom']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['orgPrincip'])) {
			$query = "SELECT * FROM evenement WHERE Localisation='{$_GET['loc']}' AND orgPrincip='{$_GET['organisateurPrincip']}'";
		}
		else if(!empty($_GET['loc']) && !empty($_GET['orgSecond'])) {
			$query = "SELECT * FROM evenement WHERE Localisation='{$_GET['loc']}' AND orgSecond='{$_GET['autreOrganisateurs']}'";
		}
		else if(!empty($_GET['nom']) && !empty($_GET['publicVise'])) {
			$query = "SELECT * FROM evenement WHERE nom='{$_GET['nom']}' AND publicVise='{$_GET['publicVise']}'";
		}
		else if(!empty($_GET['nom']) && !empty($_GET['description'])) {
			$query = "SELECT * FROM evenement WHERE nom='{$_GET['nom']}' AND description='{$_GET['description']}'";
		}
		else if(!empty($_GET['nom']) && !empty($_GET['orgPrincip'])) {
			$query = "SELECT * FROM evenement WHERE nom='{$_GET['nom']}' AND orgPrincip='{$_GET['organisateurPrincip']}'";
		}
		else if(!empty($_GET['nom']) && !empty($_GET['orgSecond'])) {
			$query = "SELECT * FROM evenement WHERE nom='{$_GET['nom']}' AND orgSecond='{$_GET['autreOrganisateur']}'";
		}
		else if(!empty($_GET['nom']) && !empty($_GET['loc'])) {
			$query = "SELECT * FROM evenement WHERE nom='{$_GET['nom']}' AND loc='{$_GET['Localisation']}'";
		}		
		else if(!empty($_GET['nom'])) {
			$query = "SELECT * FROM evenement WHERE nom='{$_GET['nom']}'";
		}
		else if(!empty($_GET['loc'])) {
			$query = "SELECT * FROM evenement WHERE Localisation='{$_GET['loc']}'";
		}
		else if(!empty($_GET['description'])) {
			$query = "SELECT * FROM evenement WHERE description='{$_GET['description']}'";
		}
		else if(!empty($_GET['publicVise'])) {
			$query = "SELECT * FROM evenement WHERE publicVise='{$_GET['publicVise']}'";
		}

		
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = array(
				'nom' => $row['nom'],
                'publicVise' => $row['publicVise'],
                'description' => $row['description'],
                'datePublication' => $row['datePublication'],
				'dateReservationMax' => $row['dateReservationMax'],
                'dateEvenement' => $row['dateEvenement'],
				'organisateurPrincipal' => $row['organisateurPrincipal'],
                'autreOrganisateurs' => $row['autreOrganisateur'],
                'adresse' => $row['adresse'],
                'cp' => $row['cp'],
                'ville' => $row['ville']
            );
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
		
?>