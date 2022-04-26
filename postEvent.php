<?php

include('db_connect.php');
        $nom = $_POST["nom"];
        $publicVise = $_POST["publicVise"];
        $description = $_POST["description"];
        $datePublication = $_POST["datePublication"];
        $dateReservationMax = $_POST["DateReservationMax"];
        $dateEvenement = $_POST["dateEvenement"];
        $organisateurPrincipal = $_POST["organisateurPrincipal"];
        $autreOrganisateurs = $_POST["autreOrganisateurs"];
        $adresse = $_POST["adresse"];
        $cp = $_POST["cp"];
        $ville = $_POST["ville"];
        $query="INSERT INTO evenement(nom, publicVise, description, datePublication, dateReservationMax, dateEvenement, organisateurPrincipal, autreOrganisateurs, adresse, cp, ville) VALUE ('".$nom."','".$publicVise."','".$description."','".$datePublication."','".$dateReservationMax."','".$dateEvenement."','".$organisateurPrincipal."','".$autreOrganisateurs."', '".$adresse."', '".$cp."', '".$ville."')";

        if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Evenement PubliÃ©'
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