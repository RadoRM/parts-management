<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MouvementRepository")
 */
class Mouvement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(
     *     type="integer",
     *     message="La valeur {{ value }} n'est pas une valeur {{ type }} valide."
     * )
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Assert\Type(
     *     type="double",
     *     message="La valeur {{ value }} n'est pas une valeur {{ type }} valide."
     * )
     */
    private $dimension;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * @Assert\Type(
     *     type="double",
     *     message="La valeur {{ value }} n'est pas une valeur {{ type }} valide."
     * )
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $machineAttribution;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fournisseur", inversedBy="mouvements")
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="mouvements")
     */
    private $famille;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SousFamille", inversedBy="mouvements")
     */
    private $sousFamille;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    public function setDimension($dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getMachineAttribution(): ?string
    {
        return $this->machineAttribution;
    }

    public function setMachineAttribution(?string $machineAttribution): self
    {
        $this->machineAttribution = $machineAttribution;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
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
}
