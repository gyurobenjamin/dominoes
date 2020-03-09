<?php
namespace Dominoes\Resources;

use Dominoes\Config;
use Dominoes\Printer\Cli;

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
    }

    /**
     * Runs the play
     */
    public function run() : void
    {
        $this->generatePlayers();
        $this->generateStock();
        $this->initLine();
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
        $firstTile = $this->stock->drawATile();

        $line = new Line($firstTile);

        $line->placeTile($firstTile);

        $this->line = $line;

        Cli::start($firstTile->toString());
    }
}