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
        $characters = preg_split('//u', $this->text, -1, PREG_SPLIT_NO_EMPTY);
        $this->characters['number'] = count($characters);
        $this->characters['characterInfo'] = $this->getFrequencyOfCharacters($characters);
    }

    private function getFrequencyOfCharacters(): array
    {
        $l = mb_strlen($this->text, 'UTF-8');
        $unique = [];
        for ($i = 0; $i < $l; $i++) {
            $char = mb_substr($this->text, $i, 1, 'UTF-8');
            if (! array_key_exists($char, $unique)) {
                $unique[$char]['number'] = 0;
            }
            $unique[$char]['number']++;
            $unique[$char]['percentage'] = round($unique[$char]['number'] / $l * 100, 2);
        }

        return $unique;
    }

    private function analyzeWords()
    {
        $words = preg_split(
            '/[^\w]*([\s]+[^\w]*|$)/u',
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
        $sentences = preg_split('/(?<=[.?!;])\s+/u', $this->text, -1, PREG_SPLIT_NO_EMPTY);

        $this->sentences['number'] = count($sentences);

        $uniqueSentencesWordsByLength = $this->sortByLength(array_keys($this->getUniqueSorted($sentences)));

        $this->sentences['longest'] = array_slice($uniqueSentencesWordsByLength, 0, 10);
        $this->sentences['shortest'] = array_reverse(array_slice($uniqueSentencesWordsByLength, -10, 10));

        $result = 0;

        foreach ($sentences as $sentence) {
            $result += count(preg_split('/\s+/u', $sentence));
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

        if ($string == $this->mb_strrev($string)) {
            $this->isPalindrome = 'yes';
        }
    }

    private function reverse()
    {
        $reversed = array_reverse(preg_split(
            "/\b/u",
            $this->text
        ));

        foreach ($reversed as $key => $value) {
            if (! preg_match("/\?|\.|!|\s/u", $value)) {
                $reversed = $this->mb_strrev($value);
                $this->reversed .= $reversed;
            } else {
                $this->reversed .= $value;
            }

            $this->reversedPartial .= $value;
        }
    }

    private function mb_strrev($str): string
    {
        $r = '';
        for ($i = mb_strlen($str); $i >= 0; $i--) {
            $r .= mb_substr($str, $i, 1);
        }

        return $r;
    }
}
