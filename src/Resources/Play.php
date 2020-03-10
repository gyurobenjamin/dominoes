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
        $this->drawInitTiles(7);

        $this->nextTilEnd();
    }

    /**
     * @param int $num
     */
    public function drawInitTiles(int $num) : void
    {
        $playersGroup = $this->playersGroup;

        for ($i=0; $i < $playersGroup->getNumOfPlayers(); $i++) {
            $curPlayer = $this->playersGroup->nextPlayer();
            for ($j=0; $j < $num; $j++) {
                $tile = $this->stock->drawATile();
                if (isset($tile))
                    $curPlayer->receiveTile($tile);
            }
        }
    }

    /**
     * Doing next step(s) until the end of the game
     */
    private function nextTilEnd($noTileFound = 0) : void
    {
        $stock          = $this->stock; // Stock
        $line           = $this->line;
        $playerGroup    = $this->playersGroup;

        $lastNum        = $line->getLastNum(); // Joining data to the line
        $firstNum       = $line->getFirstNum();

        // Set the cur player to the next
        $curPlayer = $playerGroup->nextPlayer();

        // Player tries to place a tile
        [$tile, $endOfLine] = $curPlayer->pickTile($firstNum, $lastNum);
        
        // Draw tile until not found a useful one OR stock is not empty
        while ($tile === null && $stock->getNumOfTiles() > 0) {

            // Draw a tile
            $newTile = $stock->drawATile();
            if ($newTile) {
                $curPlayer->receiveTile($newTile);
                
                Cli::draw(
                    $curPlayer->getName(),
                    $newTile->toString(),
                    $curPlayer->getTilesToStringArray(),
                );
            }

            // Try to place a tile again
            [$tile, $endOfLine] = $curPlayer->pickTile($firstNum, $lastNum);
        }
        
        if ($endOfLine) {
            $lastTile = $line->getLastTile();

            // Place the picked tile into the line
            if ($tile !== null && $line->placeTile($tile, $endOfLine)) {
                Cli::play(
                    $curPlayer->getName(),
                    $tile->toString(),
                    $lastTile->toString(),
                );
            } elseif($tile !== null) {
                throw new \Exception("Tile can't be placed");
            }
        } else {
            $firstTile = $line->getFirstTile();

            // Place the picked tile into the line
            if ($tile !== null && $line->placeTile($tile, $endOfLine)) {
                Cli::play(
                    $curPlayer->getName(),
                    $tile->toString(),
                    $firstTile->toString(),
                );
            } elseif($tile !== null) {
                throw new \Exception("Tile can't be placed");
            }
        }

        // Still no tile means play is equal.
        if ($tile === null) {
            $noTileFound++;
            
            // Round...
            if ($noTileFound > $playerGroup->getNumOfPlayers()) {
                Cli::end();
                return;
            }
        };

        // Print line (board) status
        Cli::line($this->line->toStringArray());

        // Player used all their tiles, they won
        if ($curPlayer->getNumOfTiles() === 0) {
            $this->end($curPlayer);

            // exit condition
            return;
        }

        // keep doing
        $this->nextTilEnd($noTileFound);
    }

    /**
     * @param Player
     */
    private function end(Player $winner) : void
    {
        // Print to console
        Cli::win($winner->getName());
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

        // Print to console
        Cli::start($firstTile->toString());
    }
}