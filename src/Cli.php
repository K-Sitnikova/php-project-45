<?php

namespace BrainGames\Src\Cli;

use function cli\line;
use function cli\prompt;

function startGame(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
