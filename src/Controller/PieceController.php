<?php

namespace App\Controller;

use App\Entity\Piece;
use App\Entity\Fournisseur;
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
            'sousFamille' => $params->sousFamille ? $params->sousFamille : null
        ]);

        if($piece){
            $piece->setLocation($params->conteneur . "|" . $params->etagere . "|" . $params->niveau);
    
            $manager->persist($piece);
            $manager->flush();
        }

        $location = "Conteneur " . ($params->conteneur ? $params->conteneur : "?") . ", Etagère " . ($params->etagere ? $params->etagere : "?") . ", Niveau " . ($params->niveau ? $params->niveau : "?");

        return $this->json([
            'code' => 200,
            'message' => "Location edité",
            'location' => $location
        ], 200);

    }
    
    /**
     * @Route("/piece/categorie", name="piece_categorie_list")
     */
    public function listCategories(Request $request, ObjectManager $manager, PieceRepository $pieceRepo)
    {
        $repo = $this->getDoctrine()->getRepository(Fournisseur::class);

        $fournisseurs = $repo->findAll();

        return $this->render('piece/categories.html.twig', [
            'controller_name' => 'PieceController',
            'fournisseurs' => $fournisseurs
        ]);

    }

    /**
     * @Route("/piece/categorie/edit", name="piece_categorie_edit")
     */
    public function editCategories(Request $request, ObjectManager $manager)
    {
        $data = $request->getContent();
        $params = json_decode($data);

        $repo = $this->getDoctrine()->getRepository(Fournisseur::class);

        $fournisseur = $repo->find($params->id);


        if($fournisseur){
            $fournisseur->setName($params->name);
    
            $manager->persist($fournisseur);
            $manager->flush();
        }

        return $this->json([
            'code' => 200,
            'message' => "Catégorie edité"
        ], 200);

    }

    /**
     * @Route("/piece/categorie/create", name="piece_categorie_create")
     */
    public function createCategorie(Request $request, ObjectManager $manager)
    {
        $data = $request->getContent();
        $params = json_decode($data);

        $repo = $this->getDoctrine()->getRepository(Fournisseur::class);

        $fournisseur = $repo->findOneBy([
            'name' => $params->name
        ]);

        if(!$fournisseur){
            $fournisseur = new Fournisseur();
            $fournisseur->setName($params->name);
    
            $manager->persist($fournisseur);
            $manager->flush();
        }
        else {
            return $this->json([
                'code' => 200,
                'message' => "Catégorie déjà existant"
            ], 200);
        }

        return $this->json([
            'code' => 200,
            'message' => "Catégorie ajouté",
            'categorieId' => $fournisseur->getId()
        ], 200);

    }

    /**
     * @Route("/piece/categorie/delete", name="piece_categorie_delete")
     */
    public function deleteCategorie(Request $request, ObjectManager $manager)
    {
        $data = $request->getContent();
        $params = json_decode($data);

        $repo = $this->getDoctrine()->getRepository(Fournisseur::class);

        $fournisseur = $repo->find($params->id);

        if($fournisseur){
            $manager->remove($fournisseur);
            $manager->flush();
        }

        return $this->json([
            'code' => 200,
            'message' => "Catégorie supprimé"
        ], 200);

    }


}
