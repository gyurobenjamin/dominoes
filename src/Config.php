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
        'Gloria'
    ];

    /**
     * 
     */
    public function __construct(array $conf = []) {
        if (isset($conf['names']) && \is_array($conf['names'])) {
            $this->names = $conf['names'];
        }

        if (isset($conf['numberOfPlayers']) && \is_numeric($conf['numberOfPlayers'])) {
            $this->numberOfPlayers = $conf['numberOfPlayers'];
        }
    }
}