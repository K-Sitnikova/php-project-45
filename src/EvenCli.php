<?php

namespace BrainGames\Src\EvenCli;

use function cli\line;
use function cli\prompt;

function startEvenGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $first = prompt('Question: 15');
    if ($first == 'no') {
        line('Correct!');
        $second = prompt('Question: 8');
        if ($second == 'yes') {
            line('Correct!');
            $third = prompt('Question: 2');
            if ($third == 'yes') {
                line('Correct!');
                line("Congratulations, %s!", $name);
            } else {
                line("'no' is wrong answer ;(. Correct answer was 'yes'");
                line("Let's try again, %s!", $name);
            }
        } else {
            line("'no' is wrong answer ;(. Correct answer was 'yes'");
            line("Let's try again, %s!", $name);
        }
    } else {
        line("'yes' is wrong answer ;(. Correct answer was 'no'");
        line("Let's try again, %s!", $name);
    }
}
