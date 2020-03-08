<?php
namespace Dominoes\Resources;

use Dominoes\Config;

/**
 * Play represents a single round in the game
 */
class Play
{
    private $numOfPlayers = 2;
    private $players = [];
    private $config;

    /**
     * 
     */
    public function __construct(Config $config) {
        $this->config = $config;
        $this->setNumOfPlayers($config->numberOfPlayers);
    }

    /**
	 * 
	 */
	private function generatePlayers() : void
	{
		print_r($this->numberOfPlayers);
    }
    
    /**
	 * Sets the number of players in the game
	 * 
	 * @param int $num number of desired players
	 * @return int number of players
     */
    public function setNumOfPlayers(int $num) : int
    {
		$minUserNum = 2;
		$maxUserNum = count($this->config->names);

        if ($num <= $minUserNum) {
            $num = $minUserNum;
		}

		if ($num > $maxUserNum) {
			$num = $maxUserNum;
		}

		$this->numOfPlayers = $num;
		
		return $this->numOfPlayers;
    }
}