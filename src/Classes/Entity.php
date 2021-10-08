<?php

namespace Php\Project\Task\Classes;

class Entity
{
    private $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }

    // Метод работает с примером из задания, то есть с подобными строками,
    // где может присутствовать 1 знак препинания после слова и между словами имеется 1 пробел
    public function revertCharacters(): string
    {
        $sentenceParts = explode(' ', $this->str);
        $sentencePartsCount = count($sentenceParts);

        for ($i = 0; $i < $sentencePartsCount; $i += 1) {
            $chars = mb_str_split($sentenceParts[$i]);
            $charsCount = count($chars);
            $offset = preg_match('/[a-zA-Zа-яА-ЯёЁ]/u', $chars[$charsCount - 1]) ? 0 : 1;
            $countWithoutOffset = $charsCount - $offset;
            $countHalf = ceil($countWithoutOffset / 2);

            for ($j = $countWithoutOffset - 1; $j >= $countHalf; $j -= 1) {
                $val1 = $chars[$j];
                $valUpper1 = mb_strtoupper($val1);
                $valLower1 = mb_strtolower($val1);
                $val2 = $chars[$countWithoutOffset - $j - 1];
                $valUpper2 = mb_strtoupper($val2);
                $valLower2 = mb_strtolower($val2);
                $condition = '/[A-ZА-ЯЁ]/u';
                $chars[$j] = preg_match($condition, $val1) ? $valUpper2 : $valLower2;
                $chars[$countWithoutOffset - $j - 1] = preg_match($condition, $val2) ? $valUpper1 : $valLower1;
            }

            $sentenceParts[$i] = implode('', $chars);
        }

        return implode(' ', $sentenceParts);
    }
}
