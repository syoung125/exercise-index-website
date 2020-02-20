<?php
require_once "config.php";

$getArr = $_GET;

$folderPath = "./files";

$openedFilePath = "";

if(!empty($getArr)){

	if(isset($getArr["file"])){
		$openedFilePath = $getArr["file"];
	}
}


$webBuilder = new webBuilder("My index", $folderPath);

echo $webBuilder->printWebpage();

?>