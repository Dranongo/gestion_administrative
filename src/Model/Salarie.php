<?php

namespace Model;

class Salarie extends AbstractModel
{
	/**
     * @var string
     */
    protected $qualite;

	/**
     * @var string
     */
    protected $qualitesPossibles = [
    	'Monsieur',
    	'Madame'
    ];    

    /**
     * @var string
     */
    protected $nom;

    /**
     * @var string
     */
    protected $prenom;

    /**
     * @var string
     */
    protected $nomJeuneFille;

    /**
     * @var string
     */
    protected $nationalite;

    /**
     * @var \Datetime
     */
    protected $dateNaissance;

    /**
     * @var string
     */
    protected $lieuNaissance;

    /**
     * @var string
     */
    protected $adresse;

    /**
     * @var string
     */
    protected $codePostal;

    /**
     * @var string
     */
    protected $ville;

    /**
     * @var string
     */
    protected $telephone;

    /**
     * @var string
     */
    protected $mailPro;

    /**
     * @var string
     */
    protected $mailPerso;

    /**
     * @var int
     */
    protected $numSecu;

    /**
     * @var int
     */
    protected $remuneration;

    /**
     * @var bool
     */
    protected $enPoste;

    /**
     * @var string
     */
    protected $situationFamille;

    /**
     * @var string
     */
    protected $langues;

    /**
     * @var bool
     */
    protected $autreActivite;

	/**
     * @var string
     */
    protected $detailActivite;

    /**
     * @var bool
     */
    protected $autorisationMineur;

    /**
     * @var bool
     */
    protected $statutHandicap;

    /**
     * @var string
     */
    protected $tauxInvalidite;

    /**
     * @var bool
     */
    protected $etranger;

    /**
     * @param string $qualite
     * @return Salarie
     */
    public function setQualite(string $qualite): Salarie
    {
        $this->qualite = $qualite;

        return $this;
    }

    /**
     * @return string
     */
    public function getQualite(): string
    {
        return $this->qualite;
    }

    public function getQualitesPossibles() : array
    {
    	return $this->qualitesPossibles;
    }

    /**
     * @param string $nom
     * @return Salarie
     */
    public function setNom(string $nom): Salarie
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $niveau
     * @return Salarie
     */
    public function setPrenom(string $prenom): Salarie
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $nomJeuneFille
     * @return Salarie
     */
    public function setNomJeuneFille(string $nomJeuneFille): Salarie
    {
        $this->nomJeuneFille = $nomJeuneFille;

        return $this;
    }

    /**
     * @return string
     */
    public function getNomJeuneFille(): ?string
    {
        return $this->nomJeuneFille;
    }

    /**
     * @param string $nationalite
     * @return Salarie
     */
    public function setNationnalite(string $nationalite): Salarie
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * @return string
     */
    public function getNationnalite(): string
    {
        return $this->nationalite;
    }

    /**
     * @param \Datetime $dateNaissance
     * @return Salarie
     */
    public function setDateNaissance(\Datetime $dateNaissance): Salarie
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getDateNaissance(): \Datetime
    {
        return $this->dateNaissance;
    }

    /**
     * @param string $lieuNaissance
     * @return Salarie
     */
    public function setLieuNaissance(string $lieuNaissance): Salarie
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * @return string
     */
    public function getLieuNaissance(): string
    {
        return $this->lieuNaissance;
    }

    /**
     * @param string $adresse
     * @return Salarie
     */
    public function setAdresse(string $adresse): Salarie
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $codePostal
     * @return Salarie
     */
    public function setCodePostal(string $codePostal): Salarie
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return string
     */
    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    /**
     * @param string $ville
     * @return Salarie
     */
    public function setVille(string $ville): Salarie
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @param string $telephone
     * @return Salarie
     */
    public function setTelephone(string $telephone): Salarie
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $mailPro
     * @return Salarie
     */
    public function setMailPro(string $mailPro): Salarie
    {
        $this->mailPro = $mailPro;

        return $this;
    }

    /**
     * @return string
     */
    public function getMailPro()): string
    {
        return $this->mailPro;
    }

    /**
     * @param int $numSecu
     * @return Salarie
     */
    public function setNumSecu(int $numSecu): Salarie
    {
        $this->numSecu = $numSecu;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumSecu(): int
    {
        return $this->numSecu;
    }

    /**
     * @param int $remuneration
     * @return Salarie
     */
    public function setRemuneration(int $remuneration): Salarie
    {
        $this->remuneration = $remuneration;

        return $this;
    }

    /**
     * @return int
     */
    public function getRemuneration(): int
    {
        return $this->remuneration;
    }

    /**
     * @param bool $enPoste
     * @return Salarie
     */
    public function setEnPoste(bool $enPoste): Salarie
    {
        $this->enPoste = $enPoste;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEnPoste(): bool
    {
        return $this->enPoste;
    }

    /**
     * @param string $situationFamille
     * @return Salarie
     */
    public function setSituationFamiliale(string $situationFamille): Salarie
    {
        $this->situationFamille = $situationFamille;

        return $this;
    }

    /**
     * @return string
     */
    public function getSituationFamiliale(): string
    {
        return $this->situationFamille;
    }

    /**
     * @param string $langues
     * @return Salarie
     */
    public function setLangues(string $langues): Salarie
    {
        $this->langues = $langues;

        return $this;
    }

    /**
     * @return string
     */
    public function getLangues(): ?string
    {
        return $this->langues;
    }

    /**
     * @param bool $autreActivite
     * @return Salarie
     */
    public function setAutreActivite(bool $autreActivite): Salarie
    {
        $this->autreActivite = $autreActivite;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAutreActivite(): bool
    {
        return $this->autreActivite;
    }

    /**
     * @param string $detailActivite
     * @return Salarie
     */
    public function setDetailActivite(string $detailActivite): Salarie
    {
        $this->detailActivite = $detailActivite;

        return $this;
    }

    /**
     * @return string
     */
    public function getDetailActivite(): ?string
    {
        return $this->detailActivite;
    }

    /**
     * @param bool $statutHandicap
     * @return Salarie
     */
    public function setStatutHandicap(bool $statutHandicap): Salarie
    {
        $this->statutHandicap = $statutHandicap;

        return $this;
    }

    /**
     * @return bool
     */
    public function getStatutHandicap()): bool
    {
        return $this->statutHandicap;
    }

    /**
     * @param string $tauxInvalidite
     * @return Salarie
     */
    public function setTauxInvalidite(string $tauxInvalidite): Salarie
    {
        $this->tauxInvalidite = $tauxInvalidite;

        return $this;
    }

    /**
     * @return string
     */
    public function getTauxInvalidite(): ?string
    {
        return $this->tauxInvalidite;
    }


    /**
     * @param bool $etranger
     * @return Salarie
     */
    public function setEtranger(bool $etranger): Salarie
    {
        $this->etranger = $etranger;

        return $this;
    }

    public function getEtranger() : bool
    {
    	return $this->etranger;
    }
}