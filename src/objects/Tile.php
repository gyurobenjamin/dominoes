<?php
namespace Dominoes;

/**
 * Tile represents 
 */
class Tile
{
    private $next;
    private $ends = [];

    public function getEnds() : array
    {
        return $this->ends;
    }

    /**
     * 
     */
    public function getNext() : Tile
    {

    }

    /**
     * @return void
     */
    public function setNext($next) : void
    {
        $this->next = $next;
    }
}