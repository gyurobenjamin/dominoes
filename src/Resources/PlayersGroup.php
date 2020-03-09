<?php
namespace Dominoes\Resources;

/**
 * PlayerGroup represents a group of players
 */
class PlayersGroup
{
    /**
     * $first Player
     */
    private $first;

    /**
     * $head Player
     */
    private $head;

    /**
     * $names array
     */
    private $availablePlayerNames = [];

    /**
     * $numOfPlayers int
     */
    private $numOfPlayers = 2;

    /**
     * @param int $numOfPlayers
     * @param array $names
     */
    public function __construct(int $numOfPlayers, array $availablePlayerNames) {
        $this->setNumOfPlayers($numOfPlayers);
        $this->setPlayerNames($availablePlayerNames);

        print_r($this->availablePlayerNames);
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