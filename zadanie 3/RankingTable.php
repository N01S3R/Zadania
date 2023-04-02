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
        if (!isset($this->results[$player])) {
            $this->results[$player] = [
                'score' => 0,
                'played' => 0,
            ];
        }

        $this->results[$player]['score'] += $score;
        $this->results[$player]['played']++;
    }

    public function playerRank($rank)
    {
        uasort($this->players, function ($a, $b) {
            if ($a['score'] != $b['score']) {
                return $b['score'] - $a['score'];
            } elseif ($a['gamesPlayed'] != $b['gamesPlayed']) {
                return $a['gamesPlayed'] - $b['gamesPlayed'];
            } else {
                return strcmp(array_search($a, $this->players), array_search($b, $this->players));
            }
        });

        $rankedPlayers = array_values($this->players);
        return array_search($rankedPlayers[$rank - 1], $this->players);
    }
}

$result = new RankingTable(array('Jan', 'Maks', 'Monika'));
