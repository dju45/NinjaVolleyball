<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="team1", type="integer", nullable=true)
     */
    private $team1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="team2", type="integer", nullable=true)
     */
    private $team2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score1", type="integer", nullable=true)
     */
    private $score1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score2", type="integer", nullable=true)
     */
    private $score2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="winner", type="integer", nullable=true)
     */
    private $winner;

    /**
     * @var int
     *
     * @ORM\Column(name="posLine", type="integer")
     */
    private $posLine;

    /**
     * @var int
     *
     * @ORM\Column(name="posCol", type="integer")
     */
    private $posCol;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set team1.
     *
     * @param int|null $team1
     *
     * @return Game
     */
    public function setTeam1($team1 = null)
    {
        $this->team1 = $team1;

        return $this;
    }

    /**
     * Get team1.
     *
     * @return int|null
     */
    public function getTeam1()
    {
        return $this->team1;
    }

    /**
     * Set team2.
     *
     * @param int|null $team2
     *
     * @return Game
     */
    public function setTeam2($team2 = null)
    {
        $this->team2 = $team2;

        return $this;
    }

    /**
     * Get team2.
     *
     * @return int|null
     */
    public function getTeam2()
    {
        return $this->team2;
    }

    /**
     * Set score1.
     *
     * @param int|null $score1
     *
     * @return Game
     */
    public function setScore1($score1 = null)
    {
        $this->score1 = $score1;

        return $this;
    }

    /**
     * Get score1.
     *
     * @return int|null
     */
    public function getScore1()
    {
        return $this->score1;
    }

    /**
     * Set score2.
     *
     * @param int|null $score2
     *
     * @return Game
     */
    public function setScore2($score2 = null)
    {
        $this->score2 = $score2;

        return $this;
    }

    /**
     * Get score2.
     *
     * @return int|null
     */
    public function getScore2()
    {
        return $this->score2;
    }

    /**
     * Set winner.
     *
     * @param int|null $winner
     *
     * @return Game
     */
    public function setWinner($winner = null)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner.
     *
     * @return int|null
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set posLine.
     *
     * @param int $posLine
     *
     * @return Game
     */
    public function setPosLine($posLine)
    {
        $this->posLine = $posLine;

        return $this;
    }

    /**
     * Get posLine.
     *
     * @return int
     */
    public function getPosLine()
    {
        return $this->posLine;
    }

    /**
     * Set posCol.
     *
     * @param int $posCol
     *
     * @return Game
     */
    public function setPosCol($posCol)
    {
        $this->posCol = $posCol;

        return $this;
    }

    /**
     * Get posCol.
     *
     * @return int
     */
    public function getPosCol()
    {
        return $this->posCol;
    }
}
