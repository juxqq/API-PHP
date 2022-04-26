<?php

include('db_connect.php');
global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
        $id = $_GET["id"];
		$nom = $_PUT["nom"];
        $publicVise = $_PUT["publicVise"];
        $description = $_PUT["description"];
        $datePublication = $_PUT["datePublication"];
        $dateReservationMax = $_PUT["DateReservationMax"];
        $dateEvenement = $_PUT["dateEvenement"];
        $organisateurPrincipal = $_PUT["organisateurPrincipal"];
        $autreOrganisateurs = $_PUT["autreOrganisateurs"];
        $adresse = $_PUT["adresse"];
        $cp = $_PUT["cp"];
        $ville = $_PUT["ville"];
		$query="UPDATE evenement SET 
        Nom='".$nom."',
        PublicVise='".$publicVise."',
        Description='".$description."',
        DatePublication='".$datePublication."',
        DateReservationMax='".$dateReservationMax."',
        DateEvenement='".$dateEvenement."',
        OrganisateurPrincipal='".$organisateurPrincipal."',
        AutreOrganisateurs='".$autreOrganisateurs."',
        Adresse='".$adresse."',
        Cp='".$cp."',
        Ville='".$ville."',
        WHERE id=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Event mis à jour avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise à jour de event.'. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
?>