<?php

namespace BrainGames\Src\EvenCli;

use function cli\line;
use function cli\prompt;


function startEvenGame()
{
    $rounds = 3;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    while ($rounds >= 1) {
        $randomNum = rand(1, 50);
        $isEven = $randomNum % 2 === 0;
        $question = prompt("Question: ${randomNum}");
        if($question === 'yes') {
            if($isEven){
                line('Correct!');
            } else {
                line("'yes' is wrong answer ;(. Correct answer was 'no'");
                line("Let's try again, %s!", $name);
                break;
            }
        } elseif($question === 'no') {
            if($isEven){
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
    if($rounds === 0) {
        line("Congratulations, %s!", $name);
    }
}
