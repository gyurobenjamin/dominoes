<?php
namespace Dominoes;

/**
 * Stock represents 
 */
class Stock
{
    private $tiles = [];

    /**
     * This method will generate all the possible 28 tiles.
     */
    private function generateTiles()
    {
        $minNum = 0;
        $maxNum = 6;
        for ($i=$minNum; $i < $maxNum; $j++) { 
            for ($j=$minNum; $j < $maxNum; $j++) { 
                $this->tiles[] = [$i,$j];
            }
        }
    }
}