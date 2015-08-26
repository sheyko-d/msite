<?php

$name = isset($_POST["name"]) ? $_POST["name"] : NULL;
// TODO: Lat, lng and search within specific range?
$location = isset($_POST["location"]) ? $_POST["location"] : NULL;

if ($name!=NULL && $location!=NULL){
	$results_num = 3;

	if ($results_num == 0){
		echo "<h3 class='result-error'>No list exists yet</h3>";
	} else if ($results_num == 1){
		echo "<h3 class='result-success'>Result! List found</h3>";
	} else {
		echo "<h3 class='result-success'>Result! $results_num lists found</h3>";
	}
} else {
	echo "<h3 class='result-error'>Some fields are empty</h3>";
}

?>