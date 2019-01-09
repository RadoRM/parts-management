<?php

namespace App\Controller;

use App\Entity\Piece;
use App\Entity\Famille;
use App\Entity\Mouvement;
use App\Entity\Fournisseur;
use App\Entity\SousFamille;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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

    /**
     * @Route("/piece/mouvement", name="piece_mouvement")
     */
    public function mouvement(Mouvement $mouvement = null, Request $request, ObjectManager $manager)
    {
        if(!$mouvement){
            $mouvement = new Mouvement();
        }

        $form = $this->createFormBuilder($mouvement)
                     ->add('fournisseur', EntityType::class, [
                         'class' => Fournisseur::class,
                         'choice_label' => 'name'
                     ])
                     ->add('famille', EntityType::class, [
                         'class' => Famille::class,
                         'choice_label' => 'name'
                     ])
                     ->add('sousFamille', EntityType::class, [
                         'class' => SousFamille::class,
                         'choice_label' => 'name'
                     ])
                     ->add('quantity')
                     ->add('dimension')
                     ->add('weight')
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if(!$mouvement->getId()){
                $mouvement->setCreatedAt(new \DateTime());
            }
            $mouvement->setType(1);

            // set piece
            
            
            $manager->persist($mouvement);
            $manager->flush();

            // return $this->redirectToRoute('blog_show', ['id' => $article->getId()]);
        }
        return $this->render('piece/mouvement.html.twig', [
            'formMouvementPiece' => $form->createView()
        ]);
    }
}
