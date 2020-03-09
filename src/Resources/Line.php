<?php
namespace Dominoes\Resources;

/**
 * Line represents a list of tiles
 */
class Line
{
    /**
     * Tile $first
     */
    private $first;

    /**
     * Tile $head
     */
    private $head;

    /**
     * @param Tile $tile
     */
    public function placeTile(Tile $tile) : void
    {
        // empty line
        if (!isset($this->first)) {
            $ends = $tile->getEnds();

            // place the tile, direction doesn't matter
            $tile->placeTile($ends[0], $ends[1]);

            $this->first = $tile;
            $this->head = $tile;
        }
    }
}