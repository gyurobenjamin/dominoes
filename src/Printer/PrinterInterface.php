<?php
namespace Dominoes\Printer;

interface PrinterInterface
{
    static function print(string $s) : void;
    static function newLine() : void;

    /**
     * Start message with first draw
     */
    static function start(string $tile) : void;

    /**
     * Player plays out a tile
     */
    static function play(string $name, string $tile_cur, string $tile_prev) : void;

    /**
     * Player draws a tile
     */
    static function draw(string $name, string $tile) : void;

    /**
     * Print line (board) status
     */
    static function line(array $tiles) : void;

    /**
     * Print the final message with the
     */
    static function win(string $name) : void;
}