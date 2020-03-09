<?php
namespace Dominoes\Resources;

/**
 * Stock represents a set of tiles
 */
class Stock
{
    /**
     * array $tiles
     */
    private $tiles = [];

    /**
     * 
     */
    public function __construct() {
        $this->generateTiles();
    }

    /**
     * @return Tile
     */
    public function drawATile() : ?Tile
    {
        return array_pop($this->tiles);
    }

    /**
     * This method will generate all the possible 28 tiles.
     */
    private function generateTiles() : void
    {
        $minNum = 0;
        $maxNum = 6;
        for ($i=$minNum; $i <= $maxNum; $i++) { 
            for ($j=$minNum; $j <= $maxNum; $j++) { 
                $this->tiles[] = new Tile([$i, $j]);
            }
        }

        shuffle($this->tiles); // shuffle tiles
    }

    /**
     * Counts the tiles in the stock
     * @return int
     */
    public function getNumOfTiles() : int
    {
        return count($this->tiles);
    }
}