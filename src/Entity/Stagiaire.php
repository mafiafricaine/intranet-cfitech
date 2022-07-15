<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StagiaireRepository::class)
 * @ORM\Table(name="stagiaires")
 * @ORM\HasLifecycleCallbacks
 */
class Stagiaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir un genre de minimum {{ limit }} caractères !")
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=2, minMessage="Vous devez avoir un nom de minimum {{ limit }} caractères !")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=2, minMessage="Vous devez avoir un prénom de minimum {{ limit }} caractères !")
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir un pays de naissance de minimum {{ limit }} caractères !")
     */
    private $paysDeNaissance;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir un lieu de naissance de minimum {{ limit }} caractères !")
     */
    private $lieuDeNaissance;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir une nationalité de minimum {{ limit }} caractères !")
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=10, minMessage="Vous devez avoir une adresse de minimum {{ limit }} caractères !")
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=4, minMessage="Vous devez avoir un code postal de minimum {{ limit }} caractères !")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir une commune de minimum {{ limit }} caractères !")
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir une province de minimum {{ limit }} caractères !")
     */
    private $province;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir un pays de minimum {{ limit }} caractères !")
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=10, minMessage="Vous devez avoir un numéro de GSM de minimum {{ limit }} caractères !")
     */
    private $gsm;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @Assert\Length(min=9, minMessage="Vous devez avoir un numéro de fixe de minimum {{ limit }} caractères !")
     */
    private $ligneFixe;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Email(message = "Cet email '{{ value }}' n'est pas valide(ex: cochon@sal.com).")
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=5, minMessage="Vous devez avoir un email de minimum {{ limit }} caractères !")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=11, minMessage="Vous devez avoir un Registre national de minimum {{ limit }} caractères !")
     */
    private $registreNational;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Length(min=3, minMessage="Vous devez avoir un frais de déplacement de minimum {{ limit }} caractères !")
     */
    private $fraisDeDeplacement;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Votre champs ne peut pas être vide !")
     * @Assert\Iban(message="Ce n'est pas un numéro de compte valide(International Bank Account Number(IBAN)).")
     * @Assert\Length(min=16, minMessage="Vous devez avoir un compte bancaire de minimum {{ limit }} caractères !")
     */
    private $compteBancaireIBAN;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cess;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inscrit;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $dateDeCreation;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $dateDeModification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=2, minMessage="Vous devez avoir un diplome de minimum {{ limit }} caractères !")
     */
    private $diplomeObtenu;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="stagiaire")
     */
    private $formation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getPaysDeNaissance(): ?string
    {
        return $this->paysDeNaissance;
    }

    public function setPaysDeNaissance(string $paysDeNaissance): self
    {
        $this->paysDeNaissance = $paysDeNaissance;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieuDeNaissance;
    }

    public function setLieuDeNaissance(string $lieuDeNaissance): self
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getLigneFixe(): ?string
    {
        return $this->ligneFixe;
    }

    public function setLigneFixe(?string $ligneFixe): self
    {
        $this->ligneFixe = $ligneFixe;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRegistreNational(): ?string
    {
        return $this->registreNational;
    }

    public function setRegistreNational(string $registreNational): self
    {
        $this->registreNational = $registreNational;

        return $this;
    }

    public function getFraisDeDeplacement(): ?string
    {
        return $this->fraisDeDeplacement;
    }

    public function setFraisDeDeplacement(string $fraisDeDeplacement): self
    {
        $this->fraisDeDeplacement = $fraisDeDeplacement;

        return $this;
    }

    public function getCompteBancaireIBAN(): ?string
    {
        return $this->compteBancaireIBAN;
    }

    public function setCompteBancaireIBAN(string $compteBancaireIBAN): self
    {
        $this->compteBancaireIBAN = $compteBancaireIBAN;

        return $this;
    }

    public function isCess(): ?bool
    {
        return $this->cess;
    }

    public function setCess(bool $cess): self
    {
        $this->cess = $cess;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function isInscrit(): ?bool
    {
        return $this->inscrit;
    }

    public function setInscrit(bool $inscrit): self
    {
        $this->inscrit = $inscrit;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $dateDeCreation): self
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getDateDeModification(): ?\DateTimeInterface
    {
        return $this->dateDeModification;
    }

    public function setDateDeModification(\DateTimeInterface $dateDeModification): self
    {
        $this->dateDeModification = $dateDeModification;

        return $this;
    }

    /**
     * @ORM\PrePersist        		
     * @ORM\PreUpdate    
     */
    public function updateTimestamps()
    {
        if ($this->getDateDeCreation() === null) {
            $this->setDateDeCreation(new \DateTimeImmutable);
        }
        $this->setDateDeModification(new \DateTimeImmutable);
    }

    public function getDiplomeObtenu(): ?string
    {
        return $this->diplomeObtenu;
    }

    public function setDiplomeObtenu(?string $diplomeObtenu): self
    {
        $this->diplomeObtenu = $diplomeObtenu;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
