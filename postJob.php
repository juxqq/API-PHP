<?php

include('db_connect.php');
        $intitule = $_POST["intitule"];
        $description = $_POST["description"];
        $typeContrat = $_POST["typeContrat"];
        $remuneration = $_POST["remuneration"];
		$assoc = $_POST["assoc"];
		$date = $_POST["date"];
		$dateFin = $_POST["dateFin"];
		$datePublication = $_POST["datePublication"];
		$dateUpdate = $_POST["dateUpdate"];
		$competences = $_POST["competences"];
		$niveauEtudes = $_POST["niveauEtudes"];
		$experience = $_POST["experience"];
		$secteur = $_POST["secteur"];
		$adresse = $_POST["adresse"];
		$cp = $_POST["cp"];
		$ville = $_POST["ville"];

	    $query="INSERT INTO emploi(Intitule, Description, TypeContrat, Remuneration, Assoc, Date, DateFin, DatePublication, DateUpdate, Competences, NiveauEtudes, Experience, Secteur, Adresse, Cp, Ville) VALUES('".$intitule."', '".$description."', '".$typeContrat."', '".$remuneration."', '".$assoc."','".$date."', '".$dateFin."', '".$datePublication."', '".$dateUpdate."','".$competences."', '".$niveauEtudes."', '".$experience."', '".$secteur."', '".$adresse."', '".$cp."', '".$ville."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Votre annonce de job a été postée.'
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
?>