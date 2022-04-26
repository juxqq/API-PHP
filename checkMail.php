<?php
$headers = array(
    'From' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion(),
    'MIME-Version' => '1.0',
    'Content-Type' => 'text/html; charset=iso-8859-1'
);

//$message = 'Voici votre lien de validation de mail : <a href="https://www.dorian-roulet.com/stage_2022_01x02_epsi/verif.php?mail='. $_GET['mail'].'"clique </a>';
$message = '
<html>
<head>
  <title>Email reset</title>
</head>
<body>
<p>Voici votre lien de confirmation : </p>
  <a href="https://www.dorian-roulet.com/stage_2022_01x02_epsi/verif.php?mail='. $_GET['mail'].'">ici</a>
</body>
</html>';
if(!empty($_GET['mail'])) {
    if(mail($_GET['mail'], 'Confirmez votre adresse mail !', $message, $headers)) {
        echo 'Succes';
    }
    else {
        echo 'failed';
    }
}
?>