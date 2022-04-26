<?php
header('Content-Type: application/json');
$token = rand(1000,9999);
$headers = array(
    'From' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

if(mail($_GET['mail'], 'Réinitialisation du mot de passe', 'Voici votre code de réinitialisation : '.$token, $headers)) {
    $response=array(
        'code' => $token,
    );
}
else {
    $response=array(
        'error' => 'Impossible de générer le code',
    );
}

echo json_encode($response);
?>