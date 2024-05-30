<?php

namespace BrainGames\Src\Games\ProgressionCli;

use function BrainGames\Src\Cli\startGame;
use function cli\line;
use function cli\prompt;

function createProgression($length, $step): array
{
    $result = [];
    $current = $step;
    for ($i = 0; $i < $length; $i++) {
        $result[] = $current * $i + $step;
    }

    return $result;
}

function startProgressionCli(): void
{
    $name = startGame();
    $rounds = 3;
    $exercise = 'What number is missing in the progression?';
    progressionGame($name, $rounds, $exercise);
}
function progressionGame($name, $rounds, $exercise): void
{
    line($exercise);
    while ($rounds >= 1) {
        $randomLength = rand(5, 10);
        $randomStep = rand(1, 9);
        $randomHideIndex = rand(0, $randomLength - 1);
        $progression = createProgression($randomLength, $randomStep);
        $answer = $progression[$randomHideIndex];
        $progression[$randomHideIndex] = "..";
        $stringOfProgression = implode(' ', $progression);
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
