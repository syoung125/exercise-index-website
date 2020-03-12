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
		// Create NavigationBar, Tree, Content
		$this->navigationBar = new navigationBar($this->folderPath);
		$this->tree = new Tree($this->folderPath);
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
		* {
			box-sizing: border-box;
			margin: 0px;
		}
		html, body{
			height: 100%;
		}
		body {
			display: flex;
			flex-direction: column;
		}
		p {
			margin: 0px;
		}
		#top{
			flex: 3;
		    display: flex;
   			flex-direction: column;
			text-align: center;
		}
		#middle{
			flex: 14;
			display: flex;
			overflow: hidden;
		}
		#bottom{
			flex: 1;
			display: flex;
			align-items: center;
	      	justify-content: center;
		}
		#top, #bottom {
			background-color:#000000;
			color: #ffffff;
		}
		#middle:after {
			content: "";
			display: table;
			clear: both;
		}
		#left{
			flex: 2;
			padding-top: 20px;
			background-color:#F7F9F9;
		}
		#center{
			flex: 8;
			display: flex;
			overflow: auto;
			flex-direction: column;
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