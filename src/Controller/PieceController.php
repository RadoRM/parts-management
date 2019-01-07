<?php

namespace App\Controller;

use App\Entity\Piece;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PieceController extends AbstractController
{
    /**
     * @Route("/piece", name="piece")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Piece::class);

        $pieces = $repo->findAll();

        for($i = 0; $i < count($pieces); $i++){
            if($pieces[$i]->getLocation()){
                $location = explode("|", $pieces[$i]->getLocation());
                if(count($location) > 1)
                    $pieces[$i]->setLocation("Conteneur n°" . $location[0] . ", Etagère n°" . $location[1] . ", Niveau " . $location[2]);
            }
        }

        return $this->render('piece/index.html.twig', [
            'controller_name' => 'PieceController',
            'pieces' => $pieces
        ]);
    }
}
