<?php
echo "<h1>String Functions are below:</h1>";

$name = "Bhaki Italia.";
echo $name;
echo "<br><br>";

echo "strlen() : ";
echo "length of string is : " . strlen($name);
echo "<br><br>";

echo "str_word_count() : ";
echo "word count of string is :" . str_word_count($name);
echo "<br><br>";

echo "strrev() : ";
echo "reverse of string is : " . strrev($name);
echo "<br><br>";

echo "strpos() : ";
echo "position of 'a' in string is : " . strpos($name, "a");
echo "<br>";
echo "position of 'l' in string is : " . strpos($name, "l");
echo "<br><br>";

echo "strtoupper() : ";
echo "upper case of string is : " . strtoupper($name);
echo "<br><br>";

echo "strtolower() : ";
echo "lower case of string is : " . strtolower($name);
echo "<br><br>";

echo "str_replace() : ";
echo "replace 'a' with 'o' in string is : " . str_replace("a", "o", $name);
echo "<br>";
echo "replace 'i' with 'd' in string is : " . str_replace("i", "d", $name);
echo "<br><br>";

echo "trim() : ";
echo "remove space from string is : " . trim("  hlo  ");
echo "<br><br>";

echo "explode() : ";
$mystring = "Hello, how are you?";
$myarray = explode(" ", $mystring);
echo "string is : " . $mystring;
echo "<br>";
print_r($myarray);
echo "<br><br>";

echo "implode() : ";
$myarray = array("Hello", "how", "are", "you");
$mystring = implode(" ", $myarray);
echo "array is : ";
print_r($myarray);
echo "<br>";
print_r($mystring);
echo "<br><br>";

echo "substr() : ";
echo "substring of string is : " . substr($name, 5, 7);
echo "<br><br>";
