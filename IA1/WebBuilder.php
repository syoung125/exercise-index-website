<?php

class WebBuilder {
	private $title;
	private $styleContent;
	private $navContent;
	private $treeContent;
	private $contentContent;
	private $footerContent;

	private $folderPath;
	private $navBarOj;
	private $treeOj;
	private $contentOj;

	function __construct(string $title)
	{
		$this->title = $title;
		$this->folderPath = "./files";
	}
	function addTag(string $type, string $content, $id = null)
	{
		if($id == null){
			$content = "<$type>$content</$type>";
		}else{
			$content = "<$type id = '$id'>$content</$type>";
		}
		return $content;
	}
	function addNavBar(NavigationBar $object)
	{
		$this->navBarOj = $object;
		$this->navContent = "";
		$this->navContent .= $this->navBarOj->getNav();
	}
	function addTree(Tree $object)
	{
		$this->treeOj = $object;
		$this->treeContent = "";
		$this->treeContent .= $this->treeOj->getTree();
	}
	function addContent(Content $object)
	{
		$this->contentOj = $object;
		$this->contentContent = "";
		$this->contentContent .= $this->contentOj->getContent();
	}
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
		.$this->navBarOj->getStyle()
		.$this->contentOj->getStyle();
	}
	function printWebpage()
	{
		$this->addStyle();
		$this->addFooter();

		$content = "";
		$content .= '<!DOCTYPE html><html><head>'
		.$this->addTag("title",$this->title)
		.$this->addTag("style", $this->styleContent)
		.$this->treeOj->getStyle().$this->treeOj->getScript()
		.$this->contentOj->getLink()
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