<?php
namespace Dominoes\Resources;

/**
 * PlayerGroup represents a group of players
 */
class PlayersGroup
{
    /**
     * Player $first
     */
    private $first;

    /**
     * Player $head
     */
    private $head;

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
     * 
     */
    private function generatePlayers() : void
    {
        $indexes = array_rand($this->availablePlayerNames, $this->numOfPlayers);
        
        $firstIndex = $indexes[0];
        $firstName = $this->availablePlayerNames[$firstIndex];

        $firstPlayer = new Player();
        $firstPlayer->setName($firstName);

        $this->first = $firstPlayer;
        $this->head = $this->first;

        for ($i=1; $i < count($indexes); $i++) {
            $curIndex = $indexes[$i];
            $curName = $this->availablePlayerNames[$curIndex];

            $curPlayer = new Player();
            $curPlayer->setName($curName);
            
            $this->head->setNext($curPlayer);

            $this->head = $this->head->getNext();
        }

        print_r($this->first->getName());
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
}