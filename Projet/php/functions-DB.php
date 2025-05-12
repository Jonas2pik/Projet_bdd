<?php

require_once("./includes/config-bdd.php");


function connectionDB()
{
	$mysqli = mysqli_connect(SERVEUR, USER, PWD, DB_NAME);

	if (mysqli_connect_errno()) {
		echo "erreur" . mysqli_connect_errno();
	}

	mysqli_set_charset($mysqli, "utf8");
	return $mysqli;

}


function closeDB($mysqli)
{
	mysqli_close($mysqli);
}


function readDB($mysqli, $sql_input)
{
	
	$result = mysqli_query($mysqli, $sql_input);

	if (!$result || mysqli_num_rows($result) == 0) {
		return [];
	}

	$data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	return $data;

}

function writeDB($mysqli, $sql_input)
{
	
	$result = mysqli_query($mysqli, $sql_input);
	return $result;

}

?>