<?php

include('db_connect.php');
global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
        $id_article = $_GET["id_article"];
		$title_article = $_POST["title_article"];
        $resume_article = $_POST["resume_article"];
        $text_article = $_POST["text_article"];
        $published_article = $_POST["published_article"];
        $update_article = $_POST["update_article"];
        $idUser_article = $_POST["idUser_article"];
		$query="UPDATE article SET
        title_article='".$title_article."',
        resume_article='".$resume_article."',
        text_article='".$text_article."',
        published_article='".$published_article."',
        update_article='".$update_article."',
        id_author='".$id_author."',
        WHERE id_article=".$id_article;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Article mis à jour avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise à jour de article.'. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
?>