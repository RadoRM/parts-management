<?php

namespace App\Controller;

use App\Entity\Piece;
use App\Entity\Famille;
use App\Entity\Fournisseur;
use App\Entity\SousFamille;
use App\Repository\PieceRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PieceController extends AbstractController
{
    /**
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return Response
     * @Route("/piece", name="piece")
     */
    public function index(Request $request, TranslatorInterface $translator)
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
     * @param Request $request
     * @param ObjectManager $manager
     * @param PieceRepository $pieceRepo
     * @return \Symfony\Component\HttpFoundation\JsonResponse
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
     * @param Request $request
     * @param ObjectManager $manager
     * @param PieceRepository $pieceRepo
     * @return Response
     * @Route("/piece/categorie", name="piece_categorie_list")
     */
    public function listCategories(Request $request, ObjectManager $manager, PieceRepository $pieceRepo)
    {
        $repo = $this->getDoctrine()->getRepository(Fournisseur::class);
        $fournisseurs = $repo->findAll();

        $repo = $this->getDoctrine()->getRepository(Famille::class);
        $familles = $repo->findAll();

        $repo = $this->getDoctrine()->getRepository(SousFamille::class);
        $sousFamilles = $repo->findAll();

        return $this->render('piece/categories.html.twig', [
            'controller_name' => 'PieceController',
            'fournisseurs' => $fournisseurs,
            'familles' => $familles,
            'sousFamilles' => $sousFamilles
        ]);
    }

    /**
     * @param Request $request
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/piece/categorie/edit", name="piece_categorie_edit")
     */
    public function editCategories(Request $request, ObjectManager $manager)
    {
        $data = $request->getContent();
        $params = json_decode($data);

        switch ($params->type) {
            case 'fournisseur':
                $repo = $this->getDoctrine()->getRepository(Fournisseur::class);
                break;
            case 'famille':
                $repo = $this->getDoctrine()->getRepository(Famille::class);
                break;
        }

        $categorie = $repo->find($params->id);

        if($categorie){
            $categorie->setName($params->name);
    
            $manager->persist($categorie);
            $manager->flush();
        }

        return $this->json([
            'code' => 200,
            'message' => "Catégorie editée"
        ], 200);

    }

    /**
     * @param Request $request
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/piece/categorie/create", name="piece_categorie_create")
     */
    public function createCategorie(Request $request, ObjectManager $manager)
    {
        $data = $request->getContent();
        $params = json_decode($data);

        switch ($params->type) {
            case 'fournisseur':
                $repo = $this->getDoctrine()->getRepository(Fournisseur::class);
                $categorie = $repo->findOneBy([
                    'name' => $params->name
                ]);
                if(!$categorie){
                    $categorie = new Fournisseur();
                    $categorie->setName($params->name);
            
                    $manager->persist($categorie);
                    $manager->flush();
                }
                else {
                    return $this->json([
                        'code' => 200,
                        'message' => "Catégorie déjà existant"
                    ], 200);
                }
                break;
            case 'famille':
                $repo = $this->getDoctrine()->getRepository(Famille::class);
                $categorie = $repo->findOneBy([
                    'name' => $params->name
                ]);
                if(!$categorie){
                    $categorie = new Famille();
                    $categorie->setName($params->name);
            
                    $manager->persist($categorie);
                    $manager->flush();
                }
                else {
                    return $this->json([
                        'code' => 200,
                        'message' => "Catégorie déjà existant"
                    ], 200);
                }
                break;
        }

        return $this->json([
            'code' => 200,
            'message' => "Catégorie ajouté",
            'categorieId' => $categorie->getId()
        ], 200);

    }

    /**
     * @param Request $request
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/piece/categorie/delete", name="piece_categorie_delete")
     */
    public function deleteCategorie(Request $request, ObjectManager $manager)
    {
        $data = $request->getContent();
        $params = json_decode($data);

        switch ($params->type) {
            case 'fournisseur':
                $repo = $this->getDoctrine()->getRepository(Fournisseur::class);
                break;
            case 'famille':
                $repo = $this->getDoctrine()->getRepository(Famille::class);
                break;
            case 'sousFamille':
                $repo = $this->getDoctrine()->getRepository(SousFamille::class);
                break;
        }

        $categorie = $repo->find($params->id);

        if($categorie){
            $manager->remove($categorie);
            $manager->flush();
        }

        return $this->json([
            'code' => 200,
            'message' => "Catégorie supprimé"
        ], 200);

    }

    /**
     * @param Request $request
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/piece/sous-famille/create", name="piece_sousfamille_create")
     */
    public function createSfCategorie(Request $request, ObjectManager $manager)
    {
        $data = $request->getContent();
        $params = json_decode($data);

        $repo = $this->getDoctrine()->getRepository(Famille::class);
        $famille = $repo->find($params->famille);

        $repo = $this->getDoctrine()->getRepository(SousFamille::class);

        $sousFamille = $repo->findOneBy([
            'name' => $params->name,
            'famille' => $famille
        ]);

        if(!$sousFamille){
            $sousFamille = new SousFamille();
            $sousFamille->setName($params->name);
            $sousFamille->setFamille($famille);
    
            $manager->persist($sousFamille);
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
            'categorieId' => $sousFamille->getId()
        ], 200);

    }


}
