<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PieceController extends AbstractController
{
    /**
     * @Route("/piece", name="piece")
     */
    public function index()
    {
        return $this->render('piece/index.html.twig', [
            'controller_name' => 'PieceController',
        ]);
    }
}
