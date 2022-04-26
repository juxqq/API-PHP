<?php

include('db_connect.php');
global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
        $id = $_GET["id"];
		$intitule = $_PUT["intitule"];
        $description = $_PUT["description"];
        $typeContrat = $_PUT["typeContrat"];
        $remuneration = $_PUT["remuneration"];  
		$assoc = $_PUT["assoc"];
        $date = $_PUT["date"];
        $dateFin = $_PUT["dateFin"];
        $datePublication = $_PUT["datePublication"];
        $dateUpdate = $_PUT["dateUpdate"];
        $competences = $_PUT["competences"];
        $niveauEtudes = $_PUT["niveauEtudes"];
        $experience = $_PUT["experience"];
        $secteur = $_PUT["secteur"];
        $adresse = $_PUT["adresse"];
        $cp = $_PUT["cp"];
        $ville = $_PUT["ville"];
		$query="UPDATE emploi SET Intitule='".$intitule."',
        Description='".$description."',
        TypeContrat='".$typeContrat."',
        Remuneration='".$remuneration."',
        Assoc='".$assoc."',
        Date='".$date."',
        DateFin='".$dateFin."',
        DatePublication='".$datePublication."',
        DateUpdate='".$dateUpdate."',
        Competences='".$competences."',
        NiveauEtudes='".$niveauEtudes."',
        Experience='".$experience."',
        Secteur='".$secteur."',
        Adresse='".$adresse."',
        Cp='".$cp."',
        Ville='".$ville."',
        WHERE id=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Emploi mis à jour avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise à jour de emploi.'. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
?>