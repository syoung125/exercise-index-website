<?php
class NavigationBar{

	private $path;
	private $link;

	function __construct($path)
	{
		$this->path = $path;
		$this->link = "";
	}
	
	function getStyle()
	{
		$content = '';
		$content .= '
		#ulNav {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #333;
		}

		.dropdown {
		  float: left;
		}

		.dropdown a, .dropbtn {
		  display: inline-block;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}

		.dropdown a:hover, .dropdown:hover .dropbtn {
		  background-color: red;
		}

		.dropdown {
		  display: inline-block;
		}

		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		  text-align: left;
		}

		.dropdown-content a:hover {background-color: #f1f1f1;}

		.dropdown:hover .dropdown-content {
		  display: block;
		}';

		return $content;
	}

	function getNav()
	{
		$contents = '';
		$contents .= $this->outputHTML();
		$contents .= '<ul id = "ulNav">';
		$files = array_diff(scandir($this->path), array('.', '..'));
		foreach($files as $fdname){
		  $contents .= '<li class = "dropdown">'
		        ."<a href=\"?unit=$fdname\" class=\"dropbtn\">Unit $fdname</a>";
		  $folderPath2 = $this->path."/".$fdname;
		  $files2 = array_diff(scandir($folderPath2), array('.', '..'));
		    $contents .= '<div class="dropdown-content">';
		    foreach ($files2 as $filename) {
		      $contents .= "<a href=\"?unit=$fdname&exercise=$filename\">".$filename."</a>";
		    }
		    $contents .= '</div>';
		    $contents .= '</li>';
		}
		$contents .= '</ul>';
	  return $contents;
	}

	function outputHTML()
	{
		$getArr = $_GET;
		$contents = "";
		$contents .= "<br><h3> Unit : ";
		if(isset($getArr["unit"])){
			$contents .= $getArr["unit"];
		}
		$contents .= " -- Exercise : ";
		if(isset($getArr["exercise"])){
			$contents .= $getArr["exercise"];
		}
		$contents .= " -- Filename : ";
		if(isset($getArr["file"])){
			$contents .= $getArr["file"];
		}
		$contents .= "</h3><br>";
		return $contents;
	}
}
?>