<?php
require_once("figure.php");

class Circle extends Figure{
	public $radius;
	public $count = 0;

	public function __construct(int $radius){
		$this->radius=$radius;
		
		$this->count++;
	}

	public function getArea(int $radius){
		return $radius*3*$radius;

	}

   public function getCount(){
		return  $this->count;
	}
}

$circle1 = new Circle(3);
$circle2 = new Circle(4);

print $circle1->getArea(3);
print $circle1->getCount();
	
?>