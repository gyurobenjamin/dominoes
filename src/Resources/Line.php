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
     * @return bool success to place or not
     */
    public function placeTile(Tile $tile) : bool
    {
        $ends = $tile->getEnds();

        // empty line
        if (!isset($this->first)) {
            // place the tile, direction doesn't matter
            $tile->placeTile($ends[0], $ends[1]);

            $this->first = $tile;
            $this->head = $tile;

            return true;
        }

        if ($ends[0] === $this->getLastNum()) {
            $tile->placeTile($ends[0], $ends[1]);

        }

        if ($ends[1] === $this->getLastNum()) {
            $tile->placeTile($ends[1], $ends[0]);
        }


        if($tile->isPlaced()) {
            $head = $this->head;
            $head->setNext($tile);
            $this->head = $head->getNext();
            return true;
        }

        return false;
    }

    /**
     * @return int
     */
    public function getLastNum() : int
    {
        return $this->head->getRightNum();
    }

    /**
     * @return Tile
     */
    public function getLastTile() : Tile
    {
        return $this->head;
    }

    /**
     * Returns with a list that represents the line like: [0:1, 1:1, 1:2]
     */
    public function toStringArray() : array
    {
        $tiles = [];

        $cur = $this->first;

        while ($cur !== null) {
            $tiles[] = $cur->toString();
            $cur = $cur->getNext();
        }

        return $tiles;
    }
}