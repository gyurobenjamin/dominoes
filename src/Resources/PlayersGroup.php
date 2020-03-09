<?php
namespace Dominoes\Resources;

/**
 * PlayerGroup represents a group of players
 */
class PlayersGroup
{
    /**
     * Player $firstPlayer
     */
    private $firstPlayer;

    /**
     * Player $curPlayer
     */
    private $curPlayer;

    /**
     * array $names
     */
    private $availablePlayerNames = [];

    /**
     * int $numOfPlayers
     */
    private $numOfPlayers = 2;

    /**
     * @param int $numOfPlayers
     * @param array $names
     */
    public function __construct(int $numOfPlayers, array $availablePlayerNames) {
        $this->setPlayerNames($availablePlayerNames);
        $this->setNumOfPlayers($numOfPlayers);

        $this->generatePlayers();
    }

    /**
     * Generates all the players in the group and lines them up.
     * 
     */
    private function generatePlayers() : void
    {
        $indexes = array_rand($this->availablePlayerNames, $this->numOfPlayers);
        
        $firstIndex = $indexes[0];
        $firstName = $this->availablePlayerNames[$firstIndex];

        $firstPlayer = new Player();
        $firstPlayer->setName($firstName);

        $this->firstPlayer = $firstPlayer;
        $this->curPlayer = $this->firstPlayer;

        for ($i=1; $i < count($indexes); $i++) {
            $curIndex = $indexes[$i];
            $curName = $this->availablePlayerNames[$curIndex];

            $curPlayer = new Player();
            $curPlayer->setName($curName);
            
            $this->curPlayer->setNext($curPlayer);

            $this->curPlayer = $this->curPlayer->getNext();
        }
    }

    /**
     * @return int
     */
    public function getNumOfPlayers() : int
    {
        return $this->numOfPlayers;
    }

    /**
     * Sets the number of players in the game
     * 
     * @param int $num number of desired players
     * @return int number of players
     */
    private function setNumOfPlayers(int $num) : int
    {
		$minUserNum = 2;
		$maxUserNum = count($this->availablePlayerNames);

        if ($num <= $minUserNum) {
            $num = $minUserNum;
		}

		if ($num > $maxUserNum) {
			$num = $maxUserNum;
		}

		$this->numOfPlayers = $num;
		
		return $this->numOfPlayers;
    }

    /**
     * @param int $num number of desired players
     */
    private function setPlayerNames(array $availablePlayerNames) : void
    {
        // TODO validate here
        $this->availablePlayerNames = $availablePlayerNames;
    }

    /**
     * Returns with the next player in the round
     * 
     * @return Player
     */
    public function nextPlayer() : Player
    {
        $next = $this->curPlayer->getNext();
        
        if (isset($next)) {
            $this->curPlayer = $next;
        } else {
            $this->curPlayer = $this->firstPlayer;
        }

        return $this->curPlayer;
    }
}