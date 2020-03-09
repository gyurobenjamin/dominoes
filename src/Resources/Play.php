<?php
namespace Dominoes\Resources;

use Dominoes\Config;

/**
 * Play represents a single round in the game
 */
class Play
{
    private $playersGroup;
    private $config;

    /**
     * 
     */
    public function __construct(Config $config) {
        $this->config = $config;

        $this->generatePlayers();
    }

    /**
	 * 
	 */
	private function generatePlayers() : void
	{
		$this->playersGroup = new PlayersGroup(
            $this->config->numOfPlayers,
            $this->config->names,
        );
    }
}