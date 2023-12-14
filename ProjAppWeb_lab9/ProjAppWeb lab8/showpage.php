<?php
//===========================================================
// funkcja PokazPodstrone łączy się z bazą danych, a następnie
// w zależności od id podstrony wyświetla ją bądź nie, zależy 
// od idp z pliku index.php
//===========================================================

function PokazPodstrone($id)
{
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$baza = 'moja_strona164434';

	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza);
	
	$id_clear = htmlspecialchars($id);
	$query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
	$result = mysqli_query($link ,$query);
	$row = mysqli_fetch_array($result);
	
	if(empty($row['id']))
	{
		$web = '[nie_znaleziono_strony]';
	}
	else
	{		
		$web = $row['page_contetnt'];
	}
	return $web;

	
}

?>
