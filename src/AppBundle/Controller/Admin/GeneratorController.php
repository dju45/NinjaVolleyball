<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Game;
use AppBundle\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class GeneratorController
 * @package AppBundle\Controller
 *
 * @Route("admin/tournament/generator/")
 */
class GeneratorController extends Controller
{
    /**
     * @Route("/",name="admin_generator")
     */
    public function sizeAction()
    {

        $em = $this->getDoctrine()->getManager();

        $teams = $em->getRepository(Team::class)->findAll();
        // nombre d'équipe


        // on génère le tableau de tournoi
        $arrayTournament = $this->generateArrayTournament($teams);

        // on génère les game en bdd
         $this->generateGame($arrayTournament);



        // calcul du nombre de games
        $games = $em->getRepository(Game::class)->findAll();


        return $this->render('generator.html.twig', array(
            'games' => $games,
            'teams' => $teams,
            'tournament' => $arrayTournament,

        ));
    }

    /**
     * @param int $nbTeam
     * @return int
     */
    private function calcSizeForArrayTournament(int $nbTeam): int
    {
        if ($nbTeam == 0) {
            return 0;
        }

        $i = $nbTeam;
        $nb = 0;

        while ($i > 1) {
            $i = $i / 2;
            $nb++;
        }

        $size = 2 ** $nb;

        return $size;

    }


    private function generateArrayTournament(array $teams){
        $teamsCount = count($teams);
        $size = $this->calcSizeForArrayTournament($teamsCount);

        // calcul du nombre de blanc
        $whiteCount = $size - $teamsCount;
        $teamShuffle = $teams;
        shuffle($teamShuffle);
        $tab = range(1,$size-1);

        if($whiteCount == 0) {// on place les blancs dans le tableau
            return $teamShuffle;
        }

        $n = 0;
        for ($i = 1; $i <= $whiteCount; $i++) {
            $tab[$size - $n - 1] = 'white';
            $n += 2;
        }
        $i=0;
        foreach ($teamShuffle as $key => $team){
            if( $tab[$key+$i] == 'white') {
                $i++;
            }
            $tab[$key+$i]=$team;

        }


        return $tab;
    }

    private function generateGame($teams){
        $em = $this->getDoctrine()->getManager();

        $teamsCount = count($teams);
        $size = $this->calcSizeForArrayTournament($teamsCount);

        $col = $this->countCol($size);
        $lineMax = $col * 2;

        $posLine=1;
        $posCol=$col;
        for ($i=0 ; $i < $size ; $i+=2){

            $game = new Game();
            $game->setTeam1($teams[$i]);
            if($teams[$i+1] != 'white'){
                $game->setTeam2($teams[$i+1]);

            }

            $game->setPosLine($posLine);
            $posLine++;
            $game->setPosCol($posCol);

            $em->persist($game);
            $em->flush();
        }

        return true;
    }

    private function countCol(int $size) :int
    {
        return log($size)/ log(2);

    }

}
