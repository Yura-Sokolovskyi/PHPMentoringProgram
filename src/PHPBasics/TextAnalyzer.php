<?php

namespace App\PHPBasics;

use DateTime;

class TextAnalyzer
{
    private array $sentences;
    private array $words;
    private array $characters;
    private string $isPalindrome = 'no';
    private string $reversed = '';
    private string $reversedPartial = '';

    public function __construct(private string $text)
    {
    }

    public function analyze(): array
    {
        $start = new DateTime();

        $this->analyzeCharacters();
        $this->analyzeWords();
        $this->analyzeSentence();
        $this->reverse();

        $finish = new DateTime();

        return [
            'start' => $start->format('d-m-Y H:i:s'),
            'time' => $start->diff($finish)->f,
            'reversed' => $this->reversedPartial,
            'reversedPartial' => $this->reversed,
            'isPalindrome' => $this->isPalindrome,
            'sentences' => $this->sentences,
            'words' => $this->words,
            'characters' => $this->characters,
        ];
    }

    private function analyzeCharacters()
    {
        $characters = preg_split('//', $this->text, -1, PREG_SPLIT_NO_EMPTY);
        $this->characters['number'] = count($characters);
        $this->characters['characterInfo'] = $this->getFrequencyOfCharacters();
    }

    private function getFrequencyOfCharacters(): array
    {
        $result = [];

        foreach (count_chars($this->text, 1) as $i => $val) {
            $result[chr($i)]['number'] = $val;
            $result[chr($i)]['percentage']
                = round($val / $this->characters['number'] * 100, 2);
        }

        return $result;
    }

    private function analyzeWords()
    {
        $words = preg_split(
            '/[^\w]*([\s]+[^\w]*|$)/',
            strtolower($this->text),
            -1,
            PREG_SPLIT_NO_EMPTY
        );

        $this->isPalindrome($words);

        $this->words['number'] = count($words);

        $uniqueSortedWords = $this->getUniqueSorted($words);

        $this->words['popular'] = array_slice($uniqueSortedWords, 0, 10);

        $uniqueSortedWordsByLength = $this->sortByLength(array_keys($uniqueSortedWords));

        $this->words['longest'] = array_slice($uniqueSortedWordsByLength, 0, 10);
        $this->words['shortest'] = array_reverse(array_slice($uniqueSortedWordsByLength, -10, 10));

        $length = 0;
        $palindromes = [];

        foreach ($words as $word) {
            $length += strlen($word);

            if ($word == strrev($word) && strlen($word) > 2) {
                $palindromes[] = $word;
            }
        }

        $this->words['averageWordLength'] = round($length / $this->words['number'], 2);
        $this->words['palindromesNumber'] = count($palindromes);
        $this->words['topPalindromes'] = array_slice($this->getUniqueSorted($palindromes), 0, 10);
    }

    private function analyzeSentence()
    {
        $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $this->text);

        $this->sentences['number'] = count($sentences);

        $uniqueSentencesWordsByLength = $this->sortByLength(array_keys($this->getUniqueSorted($sentences)));

        $this->sentences['longest'] = array_slice($uniqueSentencesWordsByLength, 0, 10);
        $this->sentences['shortest'] = array_reverse(array_slice($uniqueSentencesWordsByLength, -10, 10));

        $result = 0;

        foreach ($sentences as $sentence) {
            $result += str_word_count($sentence);
        }

        $this->sentences['averageSentencesLength'] = round($result / count($sentences), 2);
    }

    private function getUniqueSorted($array): array
    {
        $words = array_count_values($array);

        arsort($words);

        return $words;
    }

    private function sortByLength($array): array
    {
        usort($array, function ($a, $b) {
            return strlen($b) - strlen($a);
        });

        return $array;
    }

    private function isPalindrome($words)
    {
        $string = implode($words);

        if ($string == strrev($string)) {
            $this->isPalindrome = 'yes';
        }
    }

    private function reverse()
    {
        $reversed = array_reverse(preg_split("/\s+|\b(?=[!?.,])(?!\.\s+)/",
            $this->text));

        $previous = ' ';

        foreach ($reversed as $key => $value) {
            $reversed = strrev($value);
            if (! preg_match("/\?|\.|!|\s/", $previous) && $value != ',') {
                $value = ' '.$value;
                $reversed = ' '.$reversed;
            }
            $previous = $value;

            $this->reversedPartial .= $value;
            $this->reversed .= $reversed;
        }
    }
}
