<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Tournament;
use AppBundle\Entity\Game;
use AppBundle\Form\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @param $game
     * @Route("/update",name="admin_update_tournament")
     * @Method({"POST"})
     */
    public function updateTournament(Request $request)
    {
        $id = $request->request->get("id", "0");
        $score1 = $request->request->get("score1", "0");
        $score2 = $request->request->get("score2", "0");

        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository( 'AppBundle:Game')->findOneById($id);
        $game->setScore1($score1);
        $game->setScore2($score2);

        $em->flush();
        return $this->redirectToRoute('admin_tournament_index');

    }


}
