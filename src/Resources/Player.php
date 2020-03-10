<?php
namespace Dominoes\Resources;

/**
 * Player represents 
 */
class Player
{
    /**
     * Represents the next player in the line
     * 
     * $next Player
     */
    private $next = null;

    /**
     * Represents the name of the player
     * 
     * $name string
     */
    private $name = "";

    /**
     * List of tiles at player
     * 
     * $tiles array
     */
    private $tiles = [];

    /**
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param Player $next
     */
    public function setNext(Player $next) : void
    {
        $this->next = $next;
    }

    /**
     * @return Player
     */
    public function getNext() : ?Player
    {
        return $this->next;
    }

    /**
     * @return int
     */
    public function getNumOfTiles() : int
    {
        return count($this->tiles);
    }

    /**
     * @return array
     */
    public function getTiles() : array
    {
        return $this->tiles;
    }

    /**
     * @return array
     */
    public function getTilesToStringArray() : array
    {
        $arr = [];

        for ($i=0; $i < count($this->tiles); $i++) { 
            $arr[] = $this->tiles[$i]->toString();
        }

        return $arr;
    }

    /**
     * @param Tile $tile 
     */
    public function receiveTile(Tile $tile) : void
    {
        $this->tiles[] = $tile;
    }

    /**
     * @param int $firstNum current first number in the line
     * @param int $lastNum current last number in the line
     */
    public function pickTile(int $firstNum, int $lastNum) : array
    {
        $tiles      = $this->tiles;
        $newTiles   = [];
        $ret        = null;
        $found      = false;
        $endOfLine  = true;

        // Check all tiles
        for ($i=0; $i < $this->getNumOfTiles(); $i++) {
            $ends = $tiles[$i]->getEnds();

            // Joining possibility to the end
            if (
                $ret === null
                && (
                    $ends[0] === $lastNum
                    || $ends[1] === $lastNum
                )
            ) {
                $ret = $tiles[$i];
                $endOfLine = true;
                continue;
            }

            // Joining possibility to the front
            if (
                $ret === null
                && (
                    $ends[0] === $firstNum
                    || $ends[1] === $firstNum
                )
            ) {
                $ret = $tiles[$i];
                $endOfLine = false;
                continue;
            }

            $newTiles[] = $this->tiles[$i];
        }

        $this->tiles = $newTiles;

        return [
            $ret,
            $endOfLine
        ];
    }
}