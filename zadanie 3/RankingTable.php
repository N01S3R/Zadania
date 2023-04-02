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
        uasort($this->results, function ($a, $b) {
            if ($a['score'] != $b['score']) {
                return $b['score'] - $a['score'];
            } elseif ($a['played'] != $b['played']) {
                return $a['played'] - $b['played'];
            } else {
                return array_search(array_keys($this->results, $a)[0], $this->players)
                    - array_search(array_keys($this->results, $b)[0], $this->players);
            }
        });

        $players = array_keys($this->results);
        $player = $players[$rank - 1];

        return $player;
    }
}

$result = new RankingTable(array('Jan', 'Maks', 'Monika'));
$result->recordResult('Jan', 2);
$result->recordResult('Maks', 3);
$result->recordResult('Monika', 5);
echo $result->playerRank(1);
