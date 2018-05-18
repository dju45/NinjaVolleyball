<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Tournament;
use AppBundle\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @package AppBundle\Controller
 *
 * @Route("admin/tournament")
 */
class TournamentController extends Controller
{
    /**
     * @Route("/", name="admin_tournament_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository( 'AppBundle:Game')->findAll();
        $firstCol = $this->seekFirstCol($games);



        return $this->render('tournament/index.html.twig', array(
            'games' => $games,
            'firstCol' => $firstCol,
        ));
    }

    /**
     * @param $games
     * @return int
     */
    public function seekFirstCol($games):int
    {
        $colMax = 0;
        foreach ($games as $game){
            if($game->getPosCol() > $colMax){
                $colMax = $game->getPosCol();
            }
        }
        return $colMax;
    }


}
