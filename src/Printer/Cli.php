<?php
namespace Dominoes\Printer;

class Cli implements PrinterInterface
{
    /**
     * @param string $s string to print
     */
    static function print(string $s) : void
    {
        echo $s;
    }

    /**
     * \r\n simple is that
     */
    static function newLine() : void
    {
        echo "\r\n";
    }

    /**
     * @param string $tile
     */
    static function start(string $tile) : void
    {
        $msg = "Game starting with first tile: <{$tile}>";

        self::newLine();
        self::print($msg);
        self::newLine();
    }

    /**
     * @param string $name
     * @param string $tile
     */
    static function play(
        string $name,
        string $tile_cur,
        string $tile_prev
    ) : void {
        self::print("{$name} plays <{$tile_cur}> to connect to tile <{$tile_prev}> on the board");
        self::newLine();
	}
	
	/**
     * @param string $name
     */
    static function draw(string $name, string $tile, array $allTiles) : void
    {
        $msg = "{$name} can't play, drawing tile $tile. User tiles set:";

        foreach($allTiles as $tile) {
            $msg .= " <{$tile}>";
        }

        self::print($msg);
        self::newLine();
	}
	
	/**
     * @param array[string] $tiles
     */
    static function line(array $tiles) : void
    {
        $msg = "Board is now:";

        foreach ($tiles as $tile) {
            $msg .= " <$tile>";
        }

        self::print($msg);
        self::newLine();
	}
	
	/**
	 * @param string $name
	 */
	static function win(string $name) : void
	{
        $msg = "Player {$name} has won!";
        self::print($msg);
        self::newLine();
        self::newLine();
    }
    
    /**
	 */
	static function end() : void
	{
        $msg = "Not possible to finish the game!";
        self::print($msg);
        self::newLine();
        self::newLine();
	}
}