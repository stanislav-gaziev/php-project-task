<?php

namespace Php\Project\Task\Tests\Classes;

use PHPUnit\Framework\TestCase;
use Php\Project\Task\Classes\Entity;

class EntityTest extends TestCase
{
    public function testRevert(): void
    {
        $str1 = "Привет! Давно не виделись.";
        $entity1 = new Entity($str1);
        $strReverted1 = $entity1->revertCharacters();
        $this->assertEquals('Тевирп! Онвад ен ьсиледив.', $strReverted1);

        $str2 = "Hello! How are you, Stas? I am fine. Are you?";
        $entity2 = new Entity($str2);
        $strReverted2 = $entity2->revertCharacters();
        $this->assertEquals('Olleh! Woh era uoy, Sats? I ma enif. Era uoy?', $strReverted2);
    }
}
