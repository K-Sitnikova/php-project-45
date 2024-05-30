<?php

namespace BrainGames\Src\Games\CalcCli;

use function BrainGames\Src\Cli\startGame;
use function cli\line;
use function cli\prompt;

function startCalcCli(): void
{
    $name = startGame();
    $rounds = 3;
    $exercise = "What is the result of the expression?";
    calcGame($name, $rounds, $exercise);
}

function calcGame(string $name, int $rounds, string $exercise): void
{
    line($exercise);
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
        if (isset($result)) {
            if ($question == $result) {
                line('Correct!');
            } else {
                line(" {$question} is wrong answer ;(. Correct answer was, {$result}");
                line("Let's try again, %s!", $name);
                break;
            }
        }
        $rounds--;
    }
    if ($rounds === 0) {
        line("Congratulations, %s!", $name);
    }
}
