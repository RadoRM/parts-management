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

class MouvementController extends AbstractController
{

    /**
     * @Route("/mouvement/new", name="mouvement_create")
     */
    public function create(Request $request, ObjectManager $manager)
    {
        $mouvement = new Mouvement();

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
                         'choice_label' => 'name',
                         'choice_attr' => function (SousFamille $sousFamille, $key, $index) {
                            return array('data-famille' => $sousFamille->getFamille()->getId());
                        }
                     ])
                     ->add('quantity')
                     ->add('dimension')
                     ->add('weight')
                     ->getForm();

        $form->handleRequest($request);

        dump($mouvement);

        if($form->isSubmitted() && $form->isValid()){
            $mouvement->setCreatedAt(new \DateTime());
            $mouvement->setType(1);
            
            $manager->persist($mouvement);

            // update stock in table piece
            $repo = $this->getDoctrine()->getRepository(Piece::class);
            $piece = $repo->findOneBy([
                'fournisseur' => $mouvement->getFournisseur(),
                'famille' => $mouvement->getFamille(),
                'sousFamille' => $mouvement->getSousFamille()
            ]);

            if($piece){
                $piece->setStockQuantity($piece->getStockQuantity() + $mouvement->getQuantity());
            }
            else {
                $piece = new Piece();
                $piece->setFournisseur($mouvement->getFournisseur())
                        ->setFamille($mouvement->getFamille())
                        ->setSousFamille($mouvement->getSousFamille())
                        ->setStockQuantity($mouvement->getQuantity());
            }
            $manager->persist($piece);

            $manager->flush();

            return $this->redirectToRoute('piece');
        }

        // list of sousFamille
        $repo = $this->getDoctrine()->getRepository(SousFamille::class);

        $sousFamilles = $repo->findAll();

        return $this->render('piece/mouvement.html.twig', [
            'formMouvementPiece' => $form->createView(),
            'sousFamilles' => $sousFamilles
        ]);
    }
}
