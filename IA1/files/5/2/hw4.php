<?php

require_once('class.php');

echo "Question 3: <br>";

$joe = new Mouse("poop");

echo $joe->att."<br>";

function tryHard($value){
	$nuevo = $value;
	$nuevo = "joker";
}

tryHard($joe->returnString());

echo $joe->att."<br>";

echo "<p><strong>In the Mouse class, returnString function returns the value of the attribute 'att'. tryHard function takes a value, makes it equal to a variable<br> named 'nuevo' and then changes the value of nuevo to 'joker'. However the value of att is not changed so I think, it is a value and not a reference.</strong></p>";

/*echo "Question 5: <br>";

$george = new Dog("George");
$micheal = new Dog("Micheal");

$george->age = 5;

print_r($george);

print_r($micheal);*/

?>