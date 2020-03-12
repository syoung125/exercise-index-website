<?php
class NavigationBar{

	private $path;

	function __construct($path)
	{
		$this->path = $path;
	}
	/**
	* Return the css code of NavigationBar
	* dropdown: https://www.w3schools.com/css/css_dropdowns.asp
	*/
	function getStyle()
	{
		$content = '';
		$content .= '
		#hNav {
		  flex: 2;
		  display: flex;
	      align-items: center;
	      justify-content: center;
		}
		#ulNav {
		  flex: 1;
		  display: flex;
		  align-items: center;
		  list-style-type: none;
		  background-color: #333;
		}

		.dropdown {
		  float: left;
		  display: inline-block;
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
	/**
	* Return the html code of NavigationBar header part
	* (Unit : 1 -- Exercise : 1 -- Filename :)
	*/
	function getHeader()
	{
		$contents = "";
		$fpath = array();
		$contents .= "<h3> Unit : ";
		if(isset($_GET["unit"])){
			$contents .= $_GET["unit"];
		}
		$contents .= " -- Exercise : ";
		if(isset($_GET["file"])){
			$fpath = explode("/", $_GET["file"]);	// file value : ex) ./files/1/1/circle.php
			$contents .= $fpath[3];
		} else if(isset($_GET["exercise"])){
			$contents .= $_GET["exercise"];
		}
		$contents .= " -- Filename : ";
		if(isset($_GET["file"])){
			$contents .= $fpath[count($fpath)-1];
		}
		$contents .= "</h3>";
		return $contents;
	}
	/**
	* Return the html code of NavigationBar
	*/
	function getNav()
	{
		$contents = '';
		$contents .= '<div id = "hNav">'.$this->getHeader().'</div>';
		$contents .= '<ul id = "ulNav">';
		// exclude . and ..
		$files = array_diff(scandir($this->path), array('.', '..'));	
		foreach($files as $fdname){
		  $contents .= '<li class = "dropdown">'
		        ."<a href=\"?unit=$fdname\" class=\"dropbtn\">Unit $fdname</a>";
		  $fdPath2 = $this->path."/".$fdname;
		  $files2 = array_diff(scandir($fdPath2), array('.', '..'));
		    $contents .= '<div class="dropdown-content">';
		    foreach ($files2 as $filename) {
		    	$contents .= "<a href=\"?unit=$fdname&exercise=$filename\">".$filename.'</a>';
		    }
		    $contents .= '</div>';
		    $contents .= '</li>';
		}
		$contents .= '</ul>';
		return $contents;
	}

	
}
?>