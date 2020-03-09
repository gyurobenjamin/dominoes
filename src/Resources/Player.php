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
     * @param Player $next
     */
    public function setNext(Player $next) : void
    {
        $this->next = $next;
    }

    /**
     * @return Player
     */
    public function getNext() : Player
    {
        return $this->next;
    }
}