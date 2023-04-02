<?php

class RankingTable
{
    private $players = array();
    private $results = array();

    public function __construct($players)
    {
        $this->players = $players;
        foreach ($players as $player) {
            $this->results[$player] = array('score' => 0, 'played' => 0);
        }
    }

    public function recordResult($player, $score)
    {
        $this->results[$player]['score'] += $score;
        $this->results[$player]['played']++;
    }
}

$result = new RankingTable(array('Jan', 'Maks', 'Monika'));
