<?php

include('db_connect.php');

global $conn;
		$query = "SELECT * FROM article";
		if(!empty($_GET['title'])) {
			$query = "SELECT * FROM article WHERE title_article LIKE '%{$_GET['title']}%'";
		}

		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = array(
                'id' => $row['id_article'],
                'title' => $row['title_article'],
                'resume' => $row['resume_article'],
                'text' => $row['text_article'],
                'publishedDate' => $row['published_article'],
				'editedDate' => $row['update_article'],
                'author' => $row['id_author'],
				'image' => $row['Image']
            );
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);


?>