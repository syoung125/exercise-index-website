<!DOCTYPE html>
<html>
<head>

</head>
<body>

<a href="../../../index.php">Go Back</a><br>

<h3>PHP Functions and Arrays</h3>

<p>Question 1: Can you modify the function addOne($number) to use the pre-increment? And the post increment? Does it work as expected? If not, what is happening?</p>

<?php

function addOne($num){
	return $num+1;
}

function addOnePre($num){
	return ++$num;
}

function addOnePost($num){
	return $num++;
}

echo "num: 5, with addOne function: ".addOne(5)."<br>";
echo "num: 5, with addOnePre function: ".addOnePre(5)."<br>";
echo "num: 5, with addOnePost function: ".addOnePost(5)."<br>";

echo "<strong> post increment, increments after the operation is over. so it will return the number and then increment it by one, this is why it returns a different value. <br> </strong>";

?>

<p>Question 2: Can you create a function to create lists in HTML? It should receive an array with the elements of the list, and an optional parameter to specify the type of list. It will return the string with the resulting HTML. It shouldn’t modify the arrays.</p>

<?php 

	$arrayPHP = array(
    0 => "this",
    1 => "is",
    2 => "a",
    3 => "list",
	);

	function list_maker($avalue, $list_type = 'ul'){
		$html_code = "<";
		$html_code .= $list_type;
		$html_code .= ">";

		foreach ($avalue as $val) {
			$html_code .= "<li>";
			$html_code .= $val;
			$html_code .= "</li>";
		}

		$html_code .= "</$list_type>";

		return $html_code;
	}

	echo list_maker($arrayPHP);

	echo "with parameter: " . list_maker($arrayPHP, 'ol');

?>

<p>Question 3: Can you create a function to create tables in HTML? It should receive a multidimensional array, with the data to fill the HTML table. It will return the string with the resulting HTML. It shouldn’t modify the strings.</p>

<head>
<style>
table {
  width:10%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
table {
  color: black;
}
</style>
</head>

<?php

$arrayim = array( 1 => ":-)", 2 => "idk", 3=>"value",);

function myFunction2($arrName){
foreach ($arrName as $key => $value) {
     echo "<table>";
     echo "<tr>";
     echo "<th>$key</th>";
     echo "<td>$value</td>";
     echo "</tr>";
     echo "</table>";	
     }
}
myFunction2($arrayim);

$MultiArr = array(
0=>"zero",
1 => 1,
2 => array(1,2,array(3,4),5,array(5,6)),
3=> array(1,2,"three",4,"five"),
);
print_r($MultiArr);
echo count($MultiArr);

?>

<p>Question 4 & 5 & 6: Functions can be recursive? If so, create a function that performs a deep count of the elements in a multidimensional array. (It has to count elements inside arrays). Modify the function to also calculate the deepest level (regular array is a level 1 array).</p>

<?php

$num1 = array(
	1 => 1,
	2 => array(2,3,4),
	3 => 5,
	4 => array(6,7)
,);

function count_array($test){
	$count = 0;

	foreach ($test as $val) {
		if(is_array($val)){
			$count += count_array($val);
		}
		else{
			$count++;
		}
	}
	return $count;
}

print_r($num1);
echo "<br>"."Number of elements: ".count_array($num1);

function count_level($test){
	$deepest = 1;
	$temp = 0;

	foreach ($test as $val) {
		if(is_array($val)){
			$temp++;
			$temp += count_level($val);
		}

		if($temp > $deepest){
			$deepest = $temp;
		}

		$temp = 0;
	}

	$temp = $deepest;

	return $temp;		
}

echo "<br>"."Deepest Level: ".count_level($num1);

function combined($test){
	$t_array = array(
		"totalCount" => 0,
		"deepestLevel" => 0);

	$t_array["totalCount"] = count_array($test);
	$t_array["deepestLevel"] = count_level($test);

	return $t_array;
}

echo "<br>";
print_r(combined($num1));

?>

<p>Question 7: Can you create a function to build up arrays from two strings? The first string will include comma separated keys for the array. The second string will include comma separated values.</p>

<?php 
$st = "1123, 23453, 323, 453, 523";
$myarrayy = array();
$in= "ben, merhaba, do, mo, so";

$siktir = array_combine(explode(" ", $st),explode(" ",$in));

print_r($siktir);

?>

   <p>Question 8: Can you create a function that traverses an array and modifies it: When finds a number turn it into a string, when find a string turns it into a number. (Test it with strings containing numbers and with random strings).</p>

<?php

$tekdim = array(0,1,"3lol","Party4","5kek",6);
print_r($tekdim); echo "<br>";

for($i=0; $i<6; $i++){
  $tekdim[$i] = (int )$tekdim[$i];
}

print_r($tekdim);
 
?>

</body>
</html>