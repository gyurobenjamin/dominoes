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
    public function placeTile(Tile $tile, bool $end = true) : bool
    {
        if (!$end) {
            return $this->joinTileToFront($tile);
        }
        
        return $this->joinTileToEnd($tile);
    }
    
    /**
     * @param Tile $tile
     * @return bool
     */
    private function joinTileToFront(Tile $tile) : bool
    {
        $ends       = $tile->getEnds();
        $firstNum   = $this->getFirstNum();
        $first      = $this->first;

        if ($ends[0] === $firstNum) {
            $tile->placeTile($ends[1], $ends[0]);

        }

        if ($ends[1] === $firstNum) {
            $tile->placeTile($ends[0], $ends[1]);
        }

        if($tile->isPlaced()) {
            $tile->setNext($first);

            $this->first = $tile;

            return true;
        }

        return false;
    }

    /**
     * @param Tile $tile
     * @return bool
     */
    private function joinTileToEnd(Tile $tile) : bool
    {
        $ends     = $tile->getEnds();
        $lastNum  = $this->getLastNum();
        $head     = $this->head;
        
        // empty line
        if (!isset($this->first)) {
            // place the tile, direction doesn't matter
            $tile->placeTile($ends[0], $ends[1]);

            $this->first = $tile;
            $this->head  = $tile;

            return true;
        }

        if ($ends[0] === $lastNum) {
            $tile->placeTile($ends[0], $ends[1]);

        }

        if ($ends[1] === $lastNum) {
            $tile->placeTile($ends[1], $ends[0]);
        }

        if($tile->isPlaced()) {
            $head->setNext($tile);

            $this->head = $head->getNext();

            return true;
        }

        return false;
    }

    /**
     * @return int
     */
    public function getFirstNum() : int
    {
        return $this->first ? $this->first->getLeftNum() : null;
    }

    /**
     * @return int
     */
    public function getLastNum() : ?int
    {
        return isset($this->head) ? $this->head->getRightNum() : null;
    }

    /**
     * @return Tile
     */
    public function getFirstTile() : Tile
    {
        return $this->first;
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