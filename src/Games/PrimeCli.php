<?php

namespace BrainGames\Src\Games\PrimeCli;

use function BrainGames\Src\Cli\startGame;
use function cli\line;
use function cli\prompt;

function checkPrime(int $num): bool
{
    $length = $num;
    for ($i = 1; $i <= $length; $i++) {
        if ($num % $i === 0 && $i !== 1 && $i !== $num) {
            return false;
        }
    }
    return true;
}

function startPrimeCli(): void
{
    $name = startGame();
    $rounds = 3;
    $exercise = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    primeGame($name, $rounds, $exercise);
}
function primeGame(string $name, int $rounds, string $exercise): void
{
    line($exercise);
    while ($rounds >= 1) {
        $randomNum = rand(1, 27);
        $answer = checkPrime($randomNum);
        $question = prompt("Question: {$randomNum}");
        if ($question === 'yes') {
            if ($answer) {
                line('Correct!');
            } else {
                line('"yes" is wrong answer ;(. Correct answer was "no"');
                line("Let's try again, %s!", $name);
                break;
            }
        } elseif ($question === 'no') {
            if ($answer) {
                line('"no" is wrong answer ;(. Correct answer was "yes"');
                line("Let's try again, %s!", $name);
                break;
            } else {
                line('Correct!');
            }
        } else {
            line("{$question} is wrong answer ;(. Correct answer was {$answer}");
            line("Let's try again, %s!", $name);
            break;
        }
        $rounds--;
    }
    if ($rounds === 0) {
        line("Congratulations, %s!", $name);
    }
}
