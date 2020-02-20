<?php
//content
require_once "./Highlight/Autoloader.php";
require_once "./HighlightUtilities/functions.php";
require_once "./phpFileTree/php_file_tree.php";
require_once "Download.php";

spl_autoload_register("Highlight\\Autoloader::load");


require_once('NavigationBar.php');
require_once('Tree.php');
require_once('Content.php');

require_once "WebBuilder.php";

?>