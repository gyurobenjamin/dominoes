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

	/**
	 * Return true if the current player is out of tiles
	 * 
	 * @param Player $currentPlayer
	 * @return bool
	 */
	private function checkEnd(Player $currentPlayer) : bool
	{
		$tiles = $currentPlayer->getTiles();

		// Player still has tiles, game continues
		if (count($tiles) > 0) {
			return false;
		}

		// Player has no tiles, winner found
		return true;
	}
}