<?php

class Tree{

	private $path;
	private $return_link;

	function __construct($path)
	{
		$this->path = $path;
		$this->setPath();
	}
	/**
	* Set tree path
	*/
	function setPath(){
		if(!empty($_GET)){
			if(isset($_GET["unit"])){
				$this->path .= "/".$_GET["unit"];
			}
			if(isset($_GET["exercise"])){
				$this->path .= "/".$_GET["exercise"];
			}
		}
	}
	/**
	* Return the css code of Tree
	*/
	function getStyle()
	{
		return '<link href="phpFileTree/styles/default/default.css" rel="stylesheet" type="text/css" media="screen" />';
	}
	/**
	* Return the script of Tree
	*/
	function getScript()
	{
		$contents = '';
		$contents .= '
		<script src="jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="jquery-1.3.2" type="text/javascript"></script>
		<script src="phpFileTree/php_file_tree_jquery.js" type="text/javascript"></script>
		';
		return $contents;
	}
	/**
	* Return the html code of Tree
	*/
	function getTree()
	{
		$contents = "";
		$str = "";
		if(!empty($_GET)){
			if(isset($_GET["unit"])){
				$str .= "?unit=".$_GET["unit"];
			}
			if(isset($_GET["unit"])&&isset($_GET["exercise"])){
				$str .= "&exercise=".$_GET["exercise"];
			}
			if(isset($_GET["unit"])||isset($_GET["exercise"])){
				$str .= "&";
			}
			$str .= "file=[link]";
		}
		if($str != ""){
    		$contents = php_file_tree("$this->path/", $str);
		}
    	return $contents;
	}
}
?>