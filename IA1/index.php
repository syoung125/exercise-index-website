<?php
require_once "config.php";

$getArr = $_GET;

$folderPath = "./files";

$treePath = "./files";
$openedFilePath = "";

if(!empty($getArr)){
	if(isset($getArr["unit"])){
		$treePath .= "/".$getArr["unit"];
	}
	if(isset($getArr["exercise"])){
		$treePath .= "/".$getArr["exercise"];
	}
	if(isset($getArr["file"])){
		$openedFilePath = $getArr["file"];
	}
}


$webBuilder = new webBuilder("My index");
$navigationBar = new navigationBar($folderPath);
$tree = new Tree($treePath);
$content = new Content($getArr);

$webBuilder->addNavBar($navigationBar);
$webBuilder->addTree($tree);
$webBuilder->addContent($content);


echo $webBuilder->printWebpage();
?>