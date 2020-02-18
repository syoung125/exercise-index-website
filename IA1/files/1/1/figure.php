<?php

abstract class Figure{
	public $x;
	public $y;

	abstract function getArea(int $radius);

	abstract function getCount();

	//abstract function getPerimeter();

	public function __toString(){
		return "idk";
	}

}

	
?>