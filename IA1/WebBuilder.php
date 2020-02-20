<?php

class WebBuilder
{
	private $title;
	private $folderPath;
	// object
	private $navigationBar;
	private $tree;
	private $content;
	// content: html codes
	private $styleContent;
	private $navContent;
	private $treeContent;
	private $contentContent;
	private $footerContent;

	function __construct(string $title, string $folderPath)
	{
		$this->title = $title;
		$this->folderPath = $folderPath;

		$this->navigationBar = new navigationBar($folderPath);
		$this->tree = new Tree($folderPath);
		$this->content = new Content();

		// initializing content(html code) 
		$this->styleContent = $this->navContent = $this->treeContent = $this->contentContent = $this->footerContent = "";

	}
	/**
	* This function returns code of html tag.
	*/
	function addTag(string $type, string $content, $id = null)
	{
		if($id == null){
			$content = "<$type>$content</$type>";
		}else{
			$content = "<$type id = '$id'>$content</$type>";
		}
		return $content;
	}
	/**
	* Set html code of navigation bar.
	*/
	function addNavBar()
	{
		$this->navContent = "";
		$this->navContent .= $this->navigationBar->getNav();
	}
	/**
	* Set html code of tree.
	*/
	function addTree()
	{
		$this->treeContent = "";
		$this->treeContent .= $this->tree->getTree();
	}
	/**
	* Set html code of content.
	*/
	function addContent()
	{
		$this->contentContent = "";
		$this->contentContent .= $this->content->getContent();
	}
	/**
	* Set html code of footer.
	*/
	function addFooter()
	{
		$this->footerContent = '';
		$this->footerContent .= '<p>made by seoyoung</p>';
	}
	function addStyle()
	{
		$this->styleContent = '';
		$this->styleContent .= '
		html, body{
			height: 100%;
			margin: 0px;
		}
		p {
			margin: 0px;
		}
		#top{
			text-align: center;
			color: #ffffff;
			background-color:#000000;
		}
		#middle{

		}
		#bottom{
			text-align: center;
			color: #ffffff;
			background-color:#000000;
		}
		#middle:after {
			content: "";
			display: table;
			clear: both;
		}
		#left{
			display:inline-block;
			float:left;
			width:20%;
			background-color:#F7F9F9;
		}
		#center{
			display:inline-block;
			float:left;
			width:80%;
			background-color:#ffffff;
		}' 
		.$this->navigationBar->getStyle()
		.$this->content->getStyle();
	}
	function printWebpage()
	{
		$this->addStyle();
		$this->addFooter();

		$this->addNavBar();
		$this->addTree();
		$this->addContent();


		$content = "";
		$content .= '<!DOCTYPE html><html><head>'
		.$this->addTag("title",$this->title)
		.$this->addTag("style", $this->styleContent)
		.$this->tree->getStyle()
		.$this->tree->getScript()
		.$this->content->getLink()
		.'</head><body>'
		.$this->addTag("div", $this->navContent, "top")
		.'<div id="middle">'
		.$this->addTag("div", $this->treeContent, "left")
		.$this->addTag("div", $this->contentContent, "center")
		.'</div>'
		.$this->addTag("div", $this->footerContent, "bottom")
		.'</body></html>';
		return $content;
	}
}
?>