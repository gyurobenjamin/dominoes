<?php
namespace Dominoes;

class Config
{
    public $numberOfPlayers = 2;
    public $names = [
        'Alice',
        'Bob',
        'Israr',
        'Rudy',
        'Kaia',
        'Jayda',
        'Layan',
        'Abbigail',
        'Radhika',
        'Davey',
        'Anil',
        'Haniya',
        'Philippa',
        'Rosa',
        'Polly',
        'Ella',
        'Morgan',
        'Pearl',
        'Isobel',
        'Amber',
        'Gloria',
        'Nicolas',
        'Evangeline',
        'Ismail',
        'Herbert',
        'Alvin',
        'Rufus',
        'Lara',
        'Willie',
        'Umar',
    ];

    /**
     * 
     */
    public function __construct(array $conf = []) {
        if (isset($conf['names']) && \is_array($conf['names'])) {
            $this->names = $conf['names'];
        }

        if (isset($conf['numOfPlayers']) && \is_numeric($conf['numOfPlayers'])) {
            $this->numOfPlayers = $conf['numOfPlayers'];
        }
    }
}