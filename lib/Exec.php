<?php
namespace Cli;

use Dominoes\Game;

class Exec
{
    /**
     * 
     */
    public function runDominos() : void
    {
        $game = new Game();
        $game->run();
    }
    
    /**
     * TODO
     */
    public function runTest() : void
    {
    }
}