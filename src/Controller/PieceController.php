<?php

namespace App\Controller;

use App\Entity\Piece;
use App\Repository\PieceRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
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
                $pieces[$i]->explodeLocation($pieces[$i]->getLocation());
                $location = explode("|", $pieces[$i]->getLocation());
                if(count($location) > 1)
                    $pieces[$i]->setLocation("Conteneur " . ($location[0] ? $location[0] : "?") . ", Etagère " . ($location[1] ? $location[1] : "?") . ", Niveau " . ($location[2] ? $location[2] : "?"));
            }
        }

        return $this->render('piece/index.html.twig', [
            'controller_name' => 'PieceController',
            'pieces' => $pieces
        ]);
    }
    /**
     * @Route("/piece/location/edit", name="piece_location_edit")
     */
    public function editLocation(Request $request, ObjectManager $manager, PieceRepository $pieceRepo)
    {

        $data = $request->getContent();
        $params = json_decode($data);

        $piece = $pieceRepo->findOneBy([
            'fournisseur' => $params->fournisseur,
            'famille' => $params->famille,
            'sousFamille' => $params->sousFamille
        ]);

        $piece->setLocation($params->conteneur . "|" . $params->etagere . "|" . $params->niveau);

        $manager->persist($piece);
        $manager->flush();

        $location = "Conteneur " . ($params->conteneur ? $params->conteneur : "?") . ", Etagère " . ($params->etagere ? $params->etagere : "?") . ", Niveau " . ($params->niveau ? $params->niveau : "?");

        return $this->json([
            'code' => 200,
            'message' => "Location edité",
            'location' => $location
        ], 200);

    }
}
