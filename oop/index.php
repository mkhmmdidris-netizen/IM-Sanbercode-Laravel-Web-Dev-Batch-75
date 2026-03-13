<?php
require_once "animal.php";
require_once "Ape.php";
require_once "Frog.php";

$sheep = new Animal("shaun");
echo "Name : " . $sheep->name . "<br>";        
echo "legs : " . $sheep->legs . "<br>";        
echo "Cold Blooded : " . $sheep->cold_blooded . "<br>"; 

echo "<br><br>";

$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->name . "<br>";        
echo "legs : " . $sungokong->legs . "<br>";        
echo "Cold Blooded : " . $sungokong->cold_blooded . "<br>"; 
echo "Yell : " . $sungokong->Yell . "<br>";
            

echo "<br><br>";

$kodok = new Frog("buduk");
echo "Name : " . $kodok->name . "<br>";        
echo "legs : " . $kodok->legs . "<br>";        
echo "Cold Blooded : " . $kodok->cold_blooded . "<br>";
echo "Jump : " . $kodok->jump . "<br>"; 
             
?>
