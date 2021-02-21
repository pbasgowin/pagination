<?php 
			//PAGINATION: STEPS.
//1ST: CONNETION TO THE DB.
	try{
		 $connection = new PDO('mysql:host=localhost;dbname=pagination', 'root', '');
	}catch(PDOException $e){
		echo 'ERROR: ' . $e->getmessage();
		die();
	}

//2ND: TO SET PAGE NUMBER.
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//3RD: SHOW HOW MANY ARTICLES HAS EACH PAGE.
	$articlesByPage = 5;

//4TH: CALCULATE THE INDEX, IN ORDER TO SHOW THE BEGINNING OF INDEX CHARGING ARTICLES BY PAGE.
	$index = ($page > 1) ? ($page * $articlesByPage - $articlesByPage) : 0;

//5TH: PREPARE SQL
	$articles = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articles LIMIT $index, $articlesByPage");

//6TH: EXECUTE SQL
	$articles->execute();

//7TH: FETCH DATA
	$articles = $articles->fetchAll();

//8TH: CHECK IF THERE'S NO PAGE, IN THAT CASE, HEADER TO INDEX FILE.
	if (!$page) {
		header('location: index.php');
	}
//9TH: CALCULATE THE TOTAL ARTICLES THROW A DB QUERY.
	$totalArticles = $connection->query('SELECT FOUND_ROWS() as total');
	$totalArticles = $totalArticles->fetch()['total'];

//LAST: CALCULATE TOTAL PAGINATION PAGES. 
	$articlesQuantity = ceil($totalArticles / $articlesByPage);

require 'index.view.php'; 
?>