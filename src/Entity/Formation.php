<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir un nom de minimum {{ limit }} caractères !")
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=50, minMessage="Vous devez avoir une description de minimum {{ limit }} caractères !")
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Expression(
     *     "this.getDateDebut() < this.getDateFin()",
     *     message="La date de fin de formation doit être après celle du début")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=1, minMessage="Vous devez avoir un nombre de minimum {{ limit }} caractères !")
     */
    private $maxStagiaire;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $duree;

    /**
     * @ORM\OneToMany(targetEntity=Stagiaire::class, mappedBy="formation")
     */
    private $stagiaire;

    public function __construct()
    {
        $this->stagiaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getMaxStagiaire(): ?int
    {
        return $this->maxStagiaire;
    }

    public function setMaxStagiaire(int $maxStagiaire): self
    {
        $this->maxStagiaire = $maxStagiaire;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection<int, Stagiaire>
     */
    public function getStagiaire(): Collection
    {
        return $this->stagiaire;
    }

    public function addStagiaire(Stagiaire $stagiaire): self
    {
        if (!$this->stagiaire->contains($stagiaire)) {
            $this->stagiaire[] = $stagiaire;
            $stagiaire->setFormation($this);
        }

        return $this;
    }

    public function removeStagiaire(Stagiaire $stagiaire): self
    {
        if ($this->stagiaire->removeElement($stagiaire)) {
            // set the owning side to null (unless already changed)
            if ($stagiaire->getFormation() === $this) {
                $stagiaire->setFormation(null);
            }
        }

        return $this;
    }
}
