<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FamilleRepository")
 */
class Famille
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SousFamille", mappedBy="famille")
     */
    private $sousFamilles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Piece", mappedBy="famille")
     */
    private $pieces;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mouvement", mappedBy="famille")
     */
    private $mouvements;

    public function __construct()
    {
        $this->sousFamilles = new ArrayCollection();
        $this->pieces = new ArrayCollection();
        $this->mouvements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|SousFamille[]
     */
    public function getSousFamilles(): Collection
    {
        return $this->sousFamilles;
    }

    public function addSousFamille(SousFamille $sousFamille): self
    {
        if (!$this->sousFamilles->contains($sousFamille)) {
            $this->sousFamilles[] = $sousFamille;
            $sousFamille->setFamille($this);
        }

        return $this;
    }

    public function removeSousFamille(SousFamille $sousFamille): self
    {
        if ($this->sousFamilles->contains($sousFamille)) {
            $this->sousFamilles->removeElement($sousFamille);
            // set the owning side to null (unless already changed)
            if ($sousFamille->getFamille() === $this) {
                $sousFamille->setFamille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Piece[]
     */
    public function getPieces(): Collection
    {
        return $this->pieces;
    }

    public function addPiece(Piece $piece): self
    {
        if (!$this->pieces->contains($piece)) {
            $this->pieces[] = $piece;
            $piece->setFamille($this);
        }

        return $this;
    }

    public function removePiece(Piece $piece): self
    {
        if ($this->pieces->contains($piece)) {
            $this->pieces->removeElement($piece);
            // set the owning side to null (unless already changed)
            if ($piece->getFamille() === $this) {
                $piece->setFamille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mouvement[]
     */
    public function getMouvements(): Collection
    {
        return $this->mouvements;
    }

    public function addMouvement(Mouvement $mouvement): self
    {
        if (!$this->mouvements->contains($mouvement)) {
            $this->mouvements[] = $mouvement;
            $mouvement->setFamille($this);
        }

        return $this;
    }

    public function removeMouvement(Mouvement $mouvement): self
    {
        if ($this->mouvements->contains($mouvement)) {
            $this->mouvements->removeElement($mouvement);
            // set the owning side to null (unless already changed)
            if ($mouvement->getFamille() === $this) {
                $mouvement->setFamille(null);
            }
        }

        return $this;
    }
}
