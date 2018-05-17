<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tournament;
use AppBundle\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TournamentController extends Controller
{
    /**
     * @Route("/Generate", name="generate_index")
     * @Method("GET")
     */
    public function Tournament()
    {
        $em = $this->getDoctrine()->getManager();
        $tournaments = $em->getRepository('AppBundle:Tournament')->findAll();
        $games = $em->getRepository( 'AppBundle:Game')->findAll();
        var_dump($games);

        return $this->render('tournament/index.html.twig', array(
            'tournaments' => $tournaments,
            'games' => $games,

        ));
    }

}
