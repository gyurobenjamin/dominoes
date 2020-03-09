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
     * 
     */
    public function __construct(Tile $first) {
        $this->first = $first;
        $this->head = $first;
    }
}