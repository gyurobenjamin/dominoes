<?php
namespace Dominoes\Resources;

use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
{
    public function testGenerateTiles(): void
    {
        $stock = new Stock();
        $this->assertEquals(
            $stock->getNumOfTiles(),
            28,
        );
    }
}