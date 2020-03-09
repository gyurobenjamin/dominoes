<?php
namespace Dominoes\Resources;

class Tile
{
    private $next;
    private $ends = [];

    /**
     * @param array $nums
     */
    public function __construct(array $nums)
    {
        $ends[0] = $nums[0];
        $ends[1] = $nums[1];

        $this->ends = $ends;
    }

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