<?php

include('db_connect.php');
        $title = $_POST["title"];
        $resume = $_POST["resume"];
        $text = $_POST["text"];
        $published = $_POST["published"];
        $update = $_POST["update"];
        $idUser = $_POST["idUser"];
        $query="INSERT INTO article(title_article, resume_article, text_article, published_article, update_article, id_author) VALUE ('".$title."','".$resume."','".$text."','".$published."','".$update."','".$idUser."')";

        if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Article Publié'
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