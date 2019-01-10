<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceRepository")
 */
class Piece
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fournisseur", inversedBy="pieces")
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="pieces")
     */
    private $famille;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SousFamille", inversedBy="pieces")
     */
    private $sousFamille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockQuantity;

    public function __construct()
    {
        $this->mouvements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getSousFamille(): ?SousFamille
    {
        return $this->sousFamille;
    }

    public function setSousFamille(?SousFamille $sousFamille): self
    {
        $this->sousFamille = $sousFamille;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getStockQuantity(): ?int
    {
        return $this->stockQuantity;
    }

    public function setStockQuantity(int $stockQuantity): self
    {
        $this->stockQuantity = $stockQuantity;

        return $this;
    }
}
