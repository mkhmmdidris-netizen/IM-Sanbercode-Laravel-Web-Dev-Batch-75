<?php
require_once "animal.php";

class Frog extends Animal 
{
    public $jump = "hop hop";
    public function jump() {
        echo $jump = "hop hop";
    }
}
?>
