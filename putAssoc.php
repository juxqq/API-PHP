<?php

include('db_connect.php');
global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
        $id = $_GET["id"];
		$name = $_PUT["name"];
        $siret = $_PUT["siret"];
        $president = $_PUT["president"];
		$tresorier = $_PUT["tresorier"];
		$secretaire = $_PUT["secretaire"];
		$nbMembre = $_PUT["nbMembre"];
        $description = $_PUT["description"];
        $mail = $_PUT["mail"];
        $siteWeb = $_PUT["siteWeb"];
		$pdp = $_PUT["pdp"];
        $adresse = $_PUT["adresse"];
        $cp = $_PUT["cp"];
        $ville = $_PUT["ville"];
		$query="UPDATE association SET
        Name='".$name."',
        Siret='".$siret."',
        President='".$president."',
        Tresorier='".$tresorier."',
        Secretaire='".$secretaire."',
        NbMembre='".$nbMembre."',
        Description='".$description."',
        Mail='".$mail."',
        SiteWeb='".$siteWeb."',
        Pdp='".$pdp."',
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