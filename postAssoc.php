<?php

include('db_connect.php');
        $name = $_POST["name"];
        $siret = $_POST["siret"];
        $president = $_POST["president"];
        $tresorier = $_POST["tresorier"];
        $secretaire = $_POST["secretaire"];
        $nbMembre = $_POST["nbMembre"];
        $description = $_POST["description"];
        $mail = $_POST["mail"];
        $siteWeb = $_POST["siteWeb"];
        $pdp = $_POST["pdp"];
        $adresse = $_POST["adresse"];
        $cp = $_POST["cp"];
        $ville = $_POST["ville"];
        $query="INSERT INTO association(Name, Siret, President, Tresorier, Secretaire, NbMembre, Description, Mail, SiteWeb, Pdp, Adresse, Cp, Ville) VALUES('".$name."', '".$siret."', '".$president."', '".$tresorier."', '".$secretaire."', '".$nbMembre."', '".$description."', '".$mail."', '".$siteWeb."', '".$pdp."', '".$adresse."', '".$cp."', '".$ville."')";
        if(mysqli_query($conn, $query))
        {
            $response=array(
                'status' => 1,
                'status_message' =>'Association ajoutée avec succés.'
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