<?php

namespace BrainGames\Src\Games\ProgressionCli;

use function cli\line;
use function cli\prompt;

function createProgression($length, $step): array
{
    $result = [];
    $current = 0;
    for ($i = 0; $i < $length; $i++) {
        $result[] = $step + $current;
        $current = $result[$i];
    }

    return $result;
}
function progressionGame(): void
{
    $rounds = 3;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');
    while ($rounds >= 1) {
        $randomLength = rand(5, 10);
        $randomStep = rand(1, 9);
        $randomHideIndex = rand(0, $randomLength - 1);
        $progression = createProgression($randomLength, $randomStep);
        $answer = $progression[$randomHideIndex];
        $progression[$randomHideIndex] = '..';
        $stringOfProgression = implode(',', $progression);
        $question = prompt("Question: {$stringOfProgression}");
        if ($question == $answer) {
            line('Correct!');
        } else {
            line("${question} is wrong answer ;(. Correct answer was {$answer}");
            line("Let's try again, %s!", $name);
            break;
        }
        $rounds--;
    }
    if ($rounds === 0) {
        line("Congratulations, %s!", $name);
    }
}
