<?php
namespace Dominoes\Resources;

class Tile
{
    private $next;
    private $ends = [];
    private $leftNum;
    private $rightNum;

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
     * @param int $leftNum
     * @param int $rightNum
     */
    public function placeTile(int $leftNum, int $rightNum) : void
    {
        $this->leftNum = $leftNum;
        $this->rightNum = $rightNum;
    }

    /**
     * @return array
     */
    public function getEnds() : array
    {
        return $this->ends;
    }

    /**
     * Returns with the next node
     * 
     * @return Tile
     */
    public function getNext() : Tile
    {
        return $this->next;
    }

    /**
     * Sets the next node
     * 
     * @param $next
     */
    public function setNext(Tile $next) : void
    {
        $this->next = $next;
    }

    /**
     * Returns with a representative string of the tile like 1:0
     * 
     * @return string
     */
    public function toString() : string
    {
        return "{$this->leftNum}:{$this->rightNum}";
    }

    /**
     * Tells the tile been placed in the line or not
     * 
     * @return bool
     */
    public function isPlaced() : bool
    {
        return isset($this->leftNum) && isset($this->rightNum);
    }
}