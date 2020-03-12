<?php
require_once "config.php";

$title = "My portfolio";
$folderPath = "./files";

$webBuilder = new webBuilder($title, $folderPath);

echo $webBuilder->printWebpage();

?>