<?php

namespace Php\Project\Task\Classes;

// Указал символическое название класса Entity, подразумевая, что тут может быть некая сущность
class Entity
{
    private $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }

    // Символы, которые не входят в группу '/[a-zA-Zа-яА-ЯёЁ]/u' будут считаться разделителями
    public function revertCharacters(): string
    {
        $chars = mb_str_split($this->str);
        $charsCount = count($chars);
        $result = [];
        $word = [];

        for ($i = 0; $i < $charsCount; $i += 1) {
            $nextChar = $chars[$i + 1] ?? ' ';
            $condition1 = '/[a-zA-Zа-яА-ЯёЁ]/u';

            if (!preg_match($condition1, $chars[$i])) {
                $result[] = $chars[$i];
                continue;
            } else {
                $word[] = $chars[$i];
            }

            if (!preg_match($condition1, $nextChar)) {
                $wordCount = count($word);
                $countHalf = ceil($wordCount / 2);

                for ($j = $wordCount - 1; $j >= $countHalf; $j -= 1) {
                    $val1 = $word[$j];
                    $valUpper1 = mb_strtoupper($val1);
                    $valLower1 = mb_strtolower($val1);
                    $val2 = $word[$wordCount - $j - 1];
                    $valUpper2 = mb_strtoupper($val2);
                    $valLower2 = mb_strtolower($val2);
                    $condition2 = '/[A-ZА-ЯЁ]/u';
                    $word[$j] = preg_match($condition2, $val1) ? $valUpper2 : $valLower2;
                    $word[$wordCount - $j - 1] = preg_match($condition2, $val2) ? $valUpper1 : $valLower1;
                }

                $result[] = implode('', $word);
                $word = [];
            }
        }

        return implode('', $result);
    }
}
