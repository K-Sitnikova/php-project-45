<?php

namespace BrainGames\Src\Games\PrimeCli;

use function cli\line;
use function cli\prompt;

function checkPrime($num): bool
{
    $length = $num;
    for ($i = 1; $i <= $length; $i++) {
        if ($num % $i === 0 && $i !== 1 && $i !== $num) {
            return false;
        }
    }
    return true;
}
function primeGame()
{
    $rounds = 3;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    while ($rounds >= 1) {
        $randomNum = rand(1, 27);
        $answer = checkPrime($randomNum);
        $question = prompt("Question: {$randomNum}");
        if ($question === 'yes') {
            if ($answer) {
                line('Correct!');
            } else {
                line("${question} is wrong answer ;(. Correct answer was {$answer}");
                line("Let's try again, %s!", $name);
                break;
            }
        } elseif ($question === 'no') {
            if ($answer) {
                line("${question} is wrong answer ;(. Correct answer was {$answer}");
                line("Let's try again, %s!", $name);
                break;
            } else {
                line('Correct!');
            }
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
