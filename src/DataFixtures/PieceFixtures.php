<?php

namespace App\DataFixtures;

use App\Entity\Famille;
use App\Entity\Fournisseur;
use App\Entity\SousFamille;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PieceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // Fournisseur
        $fournisseurs = array("Mercedes", "FEBI", "EURORICAMBI", "Autre 1", "Autre 2");
        for($i = 0; $i < count($fournisseurs); $i++){
            $fournisseur = new Fournisseur();

            $fournisseur->setName($fournisseurs[$i]);
            $manager->persist($fournisseur);
        }

        // Famille - SousFamille
        $familles = array("Moteur", "Boîte de vitesse", "Pont", "Suspension", "Essieu", "Instrument", "Cabine", "Autres 1", "Autres 2");
        $sousFamilles = array(
            array("2638", "MP1", "MP2", "MP3"),
            array("G155", "G210", "G240"),
            array("Avant", "Arrière 1", "Arrière 2", "Interpont"),
            array("Avant", "Arrière"),
            array("Avant", "Arrière 1", "Arrière 2"),
            array("Module", "Capteur", "Indicateur", "Autre 1", "Autre 2"),
            array(),
            array(),
            array()
        );

        for($i = 0; $i < count($familles); $i++){
            $famille = new Famille();
            $famille->setName($familles[$i]);
            $manager->persist($famille);

            for($j = 0; $j < count($sousFamilles[$i]); $j++){
                $sousFamille = new SousFamille();
                $sousFamille->setName($sousFamilles[$i][$j])->setFamille($famille);
                $manager->persist($sousFamille);
            }
        }

        $manager->flush();
    }
}
