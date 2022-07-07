<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StagiaireRepository::class)
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
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $paysDeNaissance;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lieuDeNaissance;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $province;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $gsm;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $ligneFixe;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $registreNational;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fraisDeDeplacement;

    /**
     * @ORM\Column(type="string", length=50)
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
}
