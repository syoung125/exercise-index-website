<!DOCTYPE html>
<html>

<head>

<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>

<body>

<a href="../../../index.php">Go Back</a><br>

<h3>Hello PHP</h3>

<p>Question 1: Can you produce this output using single quote strings?
\ at the end of the line?
\’ at any point in the line?
</p>
<br>
<?php
echo '<strong>Hello \\</strong>';
echo "<br>";
echo '<strong>Hello \\\'</strong>';
?>
<br>
<p>Question 2: Why do I need to put double slash in “c:\\xampp”? What happens if I do not put them?</p>
<br>
<p><strong>Otherwise the compiler will interpret it as a command and it will go to a new line. Line feed</p></strong>
<br>
<p>Question 3: What can a variable store?  Show the four different types using var_dump.</p>
<br>
<?php

$int = 1;
echo "This is an integer: {$int}		";
var_dump($int);
echo "<br>";

$float = 1.9002;
echo "This is a float: {$float}		";
var_dump($float);
echo "<br>";

$string = "Hello World";
echo "This is a string: {$string}		";
var_dump("$string");
echo "<br>";

$bool = FALSE;
echo "This is a boolean: {$bool}		";
var_dump($bool);
echo "<br>";

?>
<br>
<p>Question 4: What is the difference between $variable = 1 and $variable == 1? </p>
<br>
<p><strong>One makes the variable 1, one checks if the variable is 1.</p></strong>
<br>
<p>Question 6: Are variable names case-sensitive?</p>
<p><strong>Yes</strong></p>
<br>
<p>Question 7: Can you use spaces in variable names?</p>
<p><strong>No</strong></p>
<br>
<p>Question 8: How do you explicitly convert one variable type to another (say, a string to a number)?</p>
<p><strong>Using var_dump function</strong></p>
<br>
<p>Question 9: What is the difference between ++$j and $j++?</p>
<p><strong>++$j increments the value of j first and uses that value. $j++ uses the value of j and increments it.</strong></p>
<br>
<p>Question 10: Are the operators && and and interchangeable?</p>
<p><strong>both perform the same operation</strong></p>
<br>
<p>Question 11: Can you redefine a constant?</p>
<p><strong>No</strong></p>
<br>
<p>Question 12: When would you use the === (identity) operator?</p>
<p><strong>To check if two variables are of the same type and are equal.</strong></p>
<br>
<?php

echo "Question 14: ";
echo "<br>";

$num = PHP_INT_MAX;

$num = $num - 5;

for($i = 0; $i <10; $i++) {
	$num++;
	echo var_dump($num);
	echo "<br>";
}

echo "<br>";

echo "Question 15: ";
echo "<br>";

$var = 3;
$mul = 0;
echo 'Multiplication Table of ' . $var;
echo "<br>";

for($k = 0; $k < 9; $k++){
	$mul = $var*$k;
	echo $var . ' by ' . $k . ' is ' . $mul . "\n";
	echo "<br>";
}

echo "<br>";

echo "Question 16 - 17(works for both): ";
echo "<br>";

?>

<form  method="post">
Start: <input type="text" name="start"><br>
End: <input type="text" name="end"><br>
<input type="submit">
</form>

<?php
$var = 3;

$start = 0;
$end = 0;

if(isset($_POST["start"]) && isset($_POST["end"])){
	$start = $_POST["start"];
	$end = $_POST["end"];
}

$mul2 = 0;

echo "<p>Multiplication Table of {$var} ({$start} - {$end})</p>";

for($j = $start; $j < $end+1; $j++){
	$mul2 = $var * $j;
	echo"<p> {$var} by {$j} is {$mul2} </p>";
}

echo "<br>";
?>

<?php
echo "Question 19: ";
echo "<br>";

?>

<form  method="post">
Until?: <input type="text" name="top"><br>
<input type="submit">
</form>

<?php

$top = 0;

if(isset($_POST["top"]))
	$top = $_POST["top"];

$even = "an even number";
$three = "multiple of 3";

for($m = 0; $m < $top; $m++){
	if($m % 2 == 0 && $m % 3 == 0){
		echo "I am $m, $even $three";
		echo "<br>";
	}

	else if($m % 2 == 0){
		echo "I am $m, $even";
		echo "<br>";
	}

	else if($m % 3 == 0){
		echo "I am $m, $three";
		echo "<br>";
	}
}

echo "<br>";

?>

<p>Question 18: </p>

<br>
<h2>ASCII TABLE</h2>

<table style="width:10%">
  <tr>
    <th>Integer Value</th>
    <th>Char Value</th> 
  </tr>

 <?php

 	for($i = 32; $i < 128; $i++){
 		$cv = chr($i);
 		echo "<tr>
 				<th>$i</th>
 				<th>$cv</th>
 			</tr>";
 	}
?>

</table>

</body>
</html>
