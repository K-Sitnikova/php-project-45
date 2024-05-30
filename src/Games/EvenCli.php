<?php

namespace BrainGames\Src\Games\EvenCli;

use function BrainGames\Src\Cli\startGame;
use function cli\line;
use function cli\prompt;

function startEvenCli(): void
{
    $name = startGame();
    $rounds = 3;
    $exercise = 'Answer "yes" if the number is even, otherwise answer "no".';
    evenGame($name, $rounds, $exercise);
}

function evenGame($name, $rounds, $exercise): void
{
    line($exercise);
    while ($rounds >= 1) {
        $randomNum = rand(1, 50);
        $isEven = $randomNum % 2 === 0;
        $question = prompt("Question: ${randomNum}");
        if ($question === 'yes') {
            if ($isEven) {
                line('Correct!');
            } else {
                line("'yes' is wrong answer ;(. Correct answer was 'no'");
                line("Let's try again, %s!", $name);
                break;
            }
        } elseif ($question === 'no') {
            if ($isEven) {
                line("'yes' is wrong answer ;(. Correct answer was 'no'");
                line("Let's try again, %s!", $name);
                break;
            } else {
                line('Correct!');
            }
        } else {
            line("Let's try again, %s!", $name);
        }
        $rounds--;
    }
    if ($rounds === 0) {
        line("Congratulations, %s!", $name);
    }
}
