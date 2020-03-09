<?php
namespace Dominoes\Resources;

use Dominoes\Config;

/**
 * Play represents a single play.
 */
class Play
{
    /**
     * Config $config
     */
    private $config;

    /**
     * PlayersGroup $playersGroup
     */
    private $playersGroup;

    /**
     * Stock $stock unused tiles
     */
    private $stock;

    /**
     * Line $line used tiles in order
     */
    private $line;

    /**
     * 
     */
    public function __construct(Config $config) {
        $this->config = $config;

        $this->generatePlayers();
    }

    /**
	 * Generates all the players in a group
	 */
	private function generatePlayers() : void
	{
		$this->playersGroup = new PlayersGroup(
            $this->config->numOfPlayers,
            $this->config->names,
        );
    }

    /**
	 * Generates all the possible tiles in a stock
	 */
	private function generateStock() : void
	{
		$this->stock = new Stock();
    }

    /**
	 * Init line
	 */
	private function initLine() : void
	{
		$this->line = new Line();
    }
}