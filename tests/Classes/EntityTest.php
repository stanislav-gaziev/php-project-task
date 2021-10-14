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

        $str3 = "При-вет! ДавНо не ви-деЛись.";
        $entity3 = new Entity($str3);
        $strReverted3 = $entity3->revertCharacters();
        $this->assertEquals('Ирп-тев! ОнвАд ен ив-ьсИлед.', $strReverted3);

        $str4 = "Hel-lo! How are you, «Stas»? I am fi-ne. Are you?";
        $entity4 = new Entity($str4);
        $strReverted4 = $entity4->revertCharacters();
        $this->assertEquals('Leh-ol! Woh era uoy, «Sats»? I ma if-en. Era uoy?', $strReverted4);
    }
}
