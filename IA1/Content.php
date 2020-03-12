<?php

class content{
	private $getArr;

	function __construct()
	{
		$this->getArr = $_GET;
	}
	/**
	* return link tag
	*/
	function getLink()
	{
		return "<link rel=\"stylesheet\" type=\"text/css\" href=\"./styles/atom-one-dark.css\">";
	}
	/**
	* return the css code of content
	*/
	function getStyle()
	{
		$content = "";
		$content .= "
 			#content_header{
              	background: #000000;
             	position: sticky;
              	top: 0;
				padding: 10px 0;
    			text-align: center;
            }
            #content_body{

            } 
            table {
                border-collapse: collapse;
                border-spacing: 0;
                font-family: sans-serif;
                width: 100%;
                background: #282c34;
                color: #AEB6BF;
            }

            th, td {
                border: none;
                overflow: auto;
            }

            td[data-line-number] {
                border-right: 1px solid grey;
                padding: 0 15px;
                text-align: right;
                width: 1%;
            }

            td[data-line-number]::before {
                color: rgba(255, 255, 255, 0.5);
                content: attr(data-line-number);
                display: block;
            }

            .blob-code {
                padding: 5px 15px;
            }
            iframe{
            	width: 100%;
            	height: 400px;
            }
            ";
        return $content;
	}
	/**
	* return link from current _GET info
	*/
	function makeMenuLink()
	{
		$linkstr = "?";
		if(isset($this->getArr["unit"])){
			$linkstr .= "unit=".$this->getArr["unit"];
		}
		if(isset($this->getArr["exercise"])){
			$linkstr .= "&exercise=".$this->getArr["exercise"];
		}
		if(isset($this->getArr["unit"]) || isset($this->getArr["exercise"])){
			$linkstr .= "&";	
		}
		$linkstr .= "file=".$this->getArr["file"];
		return $linkstr;
	}
	/**
	* add content header (1. show source  2. show output  3. download  4. download all)
	*/
	function addMenu()
	{
		$content = "";
		if(empty($this->getArr) || !isset($this->getArr["file"])){
			return $content;
		}
		
		$linkstr = $this->makeMenuLink();
		$content .= '
		<div id="content_header">
	      <button type="button"><a href="'.$linkstr.'&content=showSource">show source</a></button>
	      <button type="button"><a href="'.$linkstr.'&content=showOutput">show output</a></button>
	      <button type="button"><a href="'.$linkstr.'&content=download">download</a></button>
	      <button type="button"><a href="'.$linkstr.'&content=downloadAll">download all</a></button>
	    </div>';
		return $content;
	}
	/**
	* [MENU 1] SHOW SOURCE
	*/
	function showSource()
	{
        $source_str = "";
		$filePath = "";

		if(!isset($this->getArr["file"])){
			return $source_str;
		}

		$hl = new Highlight\Highlighter();
        $hl->setAutodetectLanguages(array('php', 'xml', 'css', 'javascript'));
        $highlighted = $hl->highlightAuto(file_get_contents($this->getArr["file"]));

        $lines = HighlightUtilities\splitCodeIntoArray($highlighted->value);

        $source_str .= "<table><tbody>";
        foreach ($lines as $number => $line){
          $source_str .= "<tr>"
          ."<td id=\"L$number\" data-line-number=\"$number\"></td>
          <td id=\"LC$number\" class=\"blob-code\">"
          ."<pre><code class=\"hljs $highlighted->language\">$line</code></pre>"
          ."</td></tr>";
        }
        $source_str .= "</tbody></table>";

        return $source_str;
	}
	/**
	* [MENU 2] SHOW OUTPUT
	*/
	function showOutput(string $file){
		//return file_get_contents($file);

		$content = "";

		if(!empty($file)){
			$content .= "<iframe src=\"" . $file . "\"</iframe>";
		}
		return $content;
	}
	/**
	* Return the html code of Content area
	*/
	function getContent()
	{
		$content = "";
		$content .= $this->addMenu();
		$content .= '<div id="content_body">';
		if(isset($this->getArr["content"])){
			$file = urldecode($this->getArr["file"]);
			$menu = $this->getArr["content"];
			if($menu == 'showSource'){
				$content .= $this->showSource();
			}else if($menu == 'showOutput'){
				$content .= $this->showOutput($file);
			}else if($menu == 'download'){
				$downloadOj = new Download();
				$downloadOj->downloadFile($file);
			}else if($menu == 'downloadAll'){
				$downloadOj = new Download();
				$filePath = "";
				$zipFileName = "";
				if(isset($this->getArr["unit"])){
					$filePath .= "./files/".$this->getArr["unit"];
					$zipFileName .= "unit".$this->getArr["unit"];
				}
				if(isset($this->getArr["exercise"])){
					$filePath .= "/".$this->getArr["exercise"];
					$zipFileName .= "_exercise".$this->getArr["exercise"];
				}
				$zipFileName .= '.zip';
				$downloadOj->downloadAll($filePath, $zipFileName);
			}
		}else{	//default
			$content .= $this->showSource();
		}

		$content .= '</div>';
		return $content;
	}


}
?>