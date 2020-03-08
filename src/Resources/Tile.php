<?php
namespace Dominoes\Resources;

class Tile
{
    private $next;
    private $ends = [];

    /**
     * @return array
     */
    public function getEnds() : array
    {
        return $this->ends;
    }

    /**
     * @return Tile
     */
    public function getNext() : Tile
    {

    }

    /**
     * @param $next
     */
    public function setNext(Tile $next) : void
    {
        $this->next = $next;
    }
}