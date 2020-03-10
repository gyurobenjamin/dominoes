<?php
namespace Dominoes;

use Dominoes\Resources\Play;
use Dominoes\Printer\Printer;

class Game
{
	private $play;

    /**
     * 
     */
    public function __construct(array $confArr = []) {
		$conf = new Config($confArr);

		$this->play = new Play($conf);
    }

    /**
     * Runs the game with all the neccesary steps from the first step to the winning step.
	 * 
     */
    public function run() : void
    {
		$this->play->run();
	}
}