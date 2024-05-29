<?php

namespace BrainGames\Src\CalcCli;

use function cli\line;
use function cli\prompt;

function calcGame(): void
{
    $rounds = 3;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("What is the result of the expression?");
    $operations = array('+', '-', '*');
    while ($rounds >= 1) {
        $firstRandom = rand(0, 40);
        $secondRandom = rand(0, 40);
        $randomOperation = array_rand($operations);
        $currentOperation = $operations[$randomOperation];
        $question = prompt("Question: {$firstRandom} {$currentOperation} {$secondRandom}");
        match ($currentOperation) {
            '-' => $result =  $firstRandom - $secondRandom,
            '+' => $result =  $firstRandom + $secondRandom,
            default => $result =  $firstRandom * $secondRandom,
        };
        if ($question == $result) {
            line('Correct!');
        } else {
            line(" {$question} is wrong answer ;(. Correct answer was, {$result}");
            line("Let's try again, %s!", $name);
            break;
        }
        $rounds--;
    }
    if ($rounds === 0) {
        line("Congratulations, %s!", $name);
    }
}
