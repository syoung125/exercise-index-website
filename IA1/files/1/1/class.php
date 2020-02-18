<?php

class Mouse{

	public $att;

	function __construct(string $att){
		$this->att = $att;
	}

	function returnString(){
		return $this->att;
	}

}

?>