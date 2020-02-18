<?php

echo "<p>Question 6: </p>";

function countLines(string $path){

	$count = 0;
	$handle = fopen($path, "r");

	while(!feof($handle)){
		$count++;
		fgets($handle);
	}

	fclose($handle);

	return $count;
}

echo countLines("file1.txt")."<br>";

echo "<p>Question 7: </p><br>";

function readEcho(string $path1){
	$char = "";
	$handle = fopen($path1, "r");
	
	while(!feof($handle)){
		$char .= fgetc($handle);
	}

	fclose($handle);
	echo "<p>".$char."</p><br>";
}

readEcho("file1.txt");

echo "<p>Question 8: </p>";

function randomText(int $length){
	$text = "";

	for($i = 0; $i < $length; $i++){
		$chances = rand(0,5);

		if($chances == 0){
			$ascii = 10;
			//$text .= "<br>";
		}

		else if($chances == 1){
			$ascii = 32;
		}

		else{
			$ascii = rand(33, 126);
		}

		$text .= chr($ascii);
	}

	return $text;
}

echo randomText(15);

echo "<p>Question 9: </p>";

function readWrite(string $path1, string $path2){
	$handle = fopen($path1, "r");
	$copy = fopen($path2, "w");

	while(!feof($handle)){
		$char = fgetc($handle);
		fwrite($copy, $char);
	}

	fclose($handle);
	fclose($copy);
}

readWrite("file1.txt", "file2.txt")."<br>";


echo "<p>Question 10: </p>";

function filterWrite(string $path1, string $path2){
	$handle = fopen($path1, "r");
	$copy = fopen($path2, "w");

	$text = "";

	while(!feof($handle)){
		$char = fgetc($handle);

		if($char == 'a' || $char == 'e' || $char == 'o' || $char == 'u' || $char == 'i'){
			//fwrite($copy, $char);
		}

		else{
			$text .= $char;
		}
	}

	$text = preg_replace('/[[:^print:]]/', '', $text);
	file_put_contents($path2, $text);

	fclose($handle);
	fclose($copy);
}

filterWrite("file1.txt", "file2.txt")."<br>";


function readChange(string $path1){
	$handle = fopen($path1, "r+");
	
	$number_ascii = array(48, 49, 50, 51, 52, 53, 54, 55, 56, 57);

	while(!feof($handle)){
		$char = fgetc($handle);

		foreach ($number_ascii as $value) {
			if($char == chr($value)){
				fseek($handle, -1, SEEK_CUR);
				fwrite($handle, '*');
			}
		}
	}

	fclose($handle);
}

readChange("file1.txt");

echo

?>