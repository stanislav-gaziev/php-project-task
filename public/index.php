<?php

require __DIR__ . '/../vendor/autoload.php';

use Php\Project\Task\Classes\Entity;

$str1 = "Привет! Давно не виделись.";
$entity1 = new Entity($str1);
$strReverted1 = $entity1->revertCharacters();
echo $str1;
echo "</br>";
echo $strReverted1;

echo "</br></br>";

$str2 = "Hello! How are you, Stas? I am fine. Are you?";
$entity2 = new Entity($str2);
$strReverted2 = $entity2->revertCharacters();
echo $str2;
echo "</br>";
echo $strReverted2;
