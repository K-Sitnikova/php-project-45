<?php

namespace BrainGames\Src\Games\GcdCli;

use function BrainGames\Src\Cli\startGame;
use function cli\line;
use function cli\prompt;

function findGcd($num1, $num2)
{
    while ($num1 !== 0 && $num2 !== 0) {
        if ($num1 > $num2) {
            $num1 = $num1 % $num2;
        } else {
            $num2 = $num2 % $num1;
        }
    }
    return $num1 + $num2;
}

function startGcdCli(): void
{
    $name = startGame();
    $rounds = 3;
    $exercise = 'Find the greatest common divisor of given numbers.';
    gameGcd($name, $rounds, $exercise);
}

function gameGcd($name, $rounds, $exercise): void
{
    line($exercise);
    while ($rounds >= 1) {
        $firstRandomNum = rand(1, 20);
        $secondRandomNum = rand(1, 20);
        $question = prompt("Question: {$firstRandomNum} and {$secondRandomNum}");
        $answer = findGcd($firstRandomNum, $secondRandomNum);
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
