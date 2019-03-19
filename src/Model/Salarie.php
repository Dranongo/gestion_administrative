<?php

namespace Model;

class Salarie extends AbstractModel
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'SalarieDAO';

	/**
     * @var string
     */
    protected $qualite;

	/**
     * @var array
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
    protected $mailProfessionnel;

    /**
     * @var string
     */
    protected $mailPersonnel;

    /**
     * @var int
     */
    protected $numeroSecuriteSociale;

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
    protected $situationFamiliale;

    /**
     * @var array
     */
    protected $situationsFamilialesPossibles = [
        'Célibataire',
        'Concubin(e)',
        'Pacsé(e)',
        'Marié(e)'
    ];  

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
    protected $autorisationTravailMineur;

    /**
     * @var bool
     */
    protected $statutHandicap;

    /**
     * @var string
     */
    protected $tauxInvalidite;

    /**
     * @var array<Formation>
     */
    protected $formations = [];

    /**
     * @var array<Enfant>
     */
    protected $enfants = [];

    /**
     * @var TravailleurEtranger
     */
    protected $travailleurEtranger;

    /**
     * @var array<ContactUrgence>
     */
    protected $contactsUrgence = [];

    /**
     * @var \DateTime
     */
    protected $dateDebutCategorieSocioProfessionnelle;

    /**
     * @var \DateTime
     */
    protected $dateFinCategorieSocioProfessionnelle;

    /**
     * @var array<CategorieSocioProfessionnelle>
     */
    protected $categoriesSocioProfessionnelles = [];

    /**
     * @var array<Contrat>
     */
    protected $contrats = [];

    /**
     * @var array<Document>
     */
    protected $documents = [];

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

    /**
     * @return array
     */
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
    public function setNationalite(string $nationalite): Salarie
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * @return string
     */
    public function getNationalite(): string
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
     * @param string $mailProfessionnel
     * @return Salarie
     */
    public function setMailProfessionnel(string $mailProfessionnel): Salarie
    {
        $this->mailProfessionnel = $mailProfessionnel;

        return $this;
    }

    /**
     * @return string
     */
    public function getMailProfessionnel(): string
    {
        return $this->mailProfessionnel;
    }

    /**
     * @param string $mailPersonnel
     * @return Salarie
     */
    public function setMailPersonnel(string $mailPersonnel): Salarie
    {
        $this->mailPersonnel = $mailPersonnel;

        return $this;
    }

    /**
     * @return string
     */
    public function getMailPersonnel(): string
    {
        return $this->mailPersonnel;
    }

    /**
     * @param int $numeroSecuriteSociale
     * @return Salarie
     */
    public function setNumeroSecuriteSociale(int $numeroSecuriteSociale): Salarie
    {
        $this->numeroSecuriteSociale = $numeroSecuriteSociale;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumeroSecuriteSociale(): int
    {
        return $this->numeroSecuriteSociale;
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
     * @param string $situationFamiliale
     * @return Salarie
     */
    public function setSituationFamiliale(string $situationFamiliale): Salarie
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }

    /**
     * @return string
     */
    public function getSituationFamiliale(): string
    {
        return $this->situationFamiliale;
    }

    /**
     * @return array
     */
    public function getSituationFamilialePossibles() : array
    {
        return $this->situationsFamilialesPossibles;
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
     * @param string $autorisationTravailMineur
     * @return Salarie
     */
    public function setAutorisationTravailMineur(string $autorisationTravailMineur): Salarie
    {
        $this->autorisationTravailMineur = $autorisationTravailMineur;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAutorisationTravailMineur(): bool
    {
        return $this->autorisationTravailMineur;
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
    public function getStatutHandicap(): bool
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
     * @param array $formations
     * @return Salarie
     */
    public function setFormations(array $formations): Salarie
    {
        $this->removeAllFormations();
        foreach ($formations as $formation) {
            if ($formation instanceof Formation) {
                $this->addFormation($formation);
            }
        }

        return $this;
    }

    /**
     * @return Salarie
     */
    public function removeAllFormations(): Salarie
    {
        $this->formations = [];

        return $this;
    }

    /**
     * @param formation $formation
     * @return Salarie
     */
    public function addFormation(formation $formation): Salarie
    {
        $this->formations[] = $formation;

        return $this;
    }

    /**
     * @param formation $formation
     * @return Salarie
     */
    public function removeFormation(formation $formation): Salarie
    {
        $key = array_search($formation, $this->getFormations(), true);
        if ($key !== false) {
            unset($this->formations[$key]);
        }

        return $this;
    }

    /**
     * @return array<Formation>
     */
    public function getFormations(): array
    {
        return $this->formations;
    }

    /**
     * @param array $enfants
     * @return Salarie
     */
    public function setEnfants(array $enfants): Salarie
    {
        $this->removeAllenfants();
        foreach ($enfants as $enfant) {
            if ($enfant instanceof Enfant) {
                $this->addEnfant($enfant);
            }
        }

        return $this;
    }

    /**
     * @return Salarie
     */
    public function removeAllEnfants(): Salarie
    {
        $this->enfants = [];

        return $this;
    }

    /**
     * @param Enfant $enfant
     * @return Salarie
     */
    public function addEnfant(Enfant $enfant): Salarie
    {
        $this->enfants[] = $enfant;

        return $this;
    }

    /**
     * @param Enfant $enfant
     * @return Salarie
     */
    public function removeEnfant(Enfant $enfant): Salarie
    {
        $key = array_search($enfant, $this->getEnfants(), true);
        if ($key !== false) {
            unset($this->enfants[$key]);
        }

        return $this;
    }

    /**
     * @return array<Enfant>
     */
    public function getEnfants(): array
    {
        return $this->enfants;
    }

    /**
     * @param TravailleurEtranger $travailleurEtranger
     * @return Salarie
     */
    public function setTravailleurEtranger(TravailleurEtranger $travailleurEtranger): Salarie
    {
        $this->travailleurEtranger = $travailleurEtranger;

        return $this;
    }

    /**
     * @return TravailleurEtranger
     */
    public function getTravailleurEtranger() : TravailleurEtranger
    {
    	return $this->travailleurEtranger;
    }

    /**
     * @param array $contactsUrgence
     * @return Salarie
     */
    public function setContactsUrgence(array $contactsUrgence): Salarie
    {
        $this->removeAllContactsUrgence();
        foreach ($contactsUrgence as $contactUrgence) {
            if ($contactUrgence instanceof ContactUrgence) {
                $this->addContactUrgence($contactUrgence);
            }
        }

        return $this;
    }

    /**
     * @return Salarie
     */
    public function removeAllContactsUrgence(): Salarie
    {
        $this->contactsUrgence = [];

        return $this;
    }

    /**
     * @param ContactUrgence $contactUrgence
     * @return Salarie
     */
    public function addContactUrgence(ContactUrgence $contactUrgence): Salarie
    {
        $this->contactsUrgence[] = $contactUrgence;

        return $this;
    }

    /**
     * @param ContactUrgence $contactUrgence
     * @return Salarie
     */
    public function removeContactUrgence(ContactUrgence $contactUrgence): Salarie
    {
        $key = array_search($contactUrgence, $this->getContactsUrgence(), true);
        if ($key !== false) {
            unset($this->contactsUrgence[$key]);
        }

        return $this;
    }

    /**
     * @return array<ContactUrgence>
     */
    public function getContactsUrgence(): array
    {
        return $this->contactsUrgence;
    }

    /**
     * @param \DateTime $dateDebutCategorieSocioProfessionnelle
     * @return Salarie
     */
    public function setDateDebutCategorieSocioProfessionnelle(\DateTime $dateDebutCategorieSocioProfessionnelle): Salarie
    {
        $this->dateDebutCategorieSocioProfessionnelle = $dateDebutCategorieSocioProfessionnelle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebutCategorieSocioProfessionnelle(): ?\DateTime
    {
        return $this->dateDebutCategorieSocioProfessionnelle;
    }

    /**
     * @param \DateTime $dateFinCategorieSocioProfessionnelle
     * @return Salarie
     */
    public function setDateFinCategorieSocioProfessionnelle(\DateTime $dateFinCategorieSocioProfessionnelle): Salarie
    {
        $this->dateFinCategorieSocioProfessionnelle = $dateFinCategorieSocioProfessionnelle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateFinCategorieSocioProfessionnelle(): ?\DateTime
    {
        return $this->dateFinCategorieSocioProfessionnelle;
    }

    /**
     * @param array $categoriesSocioProfessionnelles
     * @return Salarie
     */
    public function setCategoriesSocioProfessionnelles(array $categoriesSocioProfessionnelles): Salarie
    {
        $this->removeAllSalaries();
        foreach ($categoriesSocioProfessionnelles as $categorieSocioProfessionnelle) {
            if ($categorieSocioProfessionnelle instanceof CategorieSocioProfessionnelle) {
                $this->addCategorieSocioProfessionnelle($categorieSocioProfessionnelle);
            }
        }

        return $this;
    }

    /**
     * @return Salarie
     */
    public function removeAllCategoriesSocioProfessionnelles(): Salarie
    {
        $this->categoriesSocioProfessionnelles = [];

        return $this;
    }

    /**
     * @param CategorieSocioProfessionnelle $categorieSocioProfessionnelle
     * @return Salarie
     */
    public function addCategorieSocioProfessionnelle(CategorieSocioProfessionnelle $categorieSocioProfessionnelle): Salarie
    {
        $this->categoriesSocioProfessionnelles[] = $categorieSocioProfessionnelle;

        return $this;
    }

    /*
     * @param CategorieSocioProfessionnelle $categorieSocioProfessionnelle
     * @return Salarie
     */
    public function removeCategorieSocioProfessionnelle(CategorieSocioProfessionnelle $categorieSocioProfessionnelle): Salarie
    {
        $key = array_search($categorieSocioProfessionnelle, $this->getCategoriesSocioProfessionnelles(), true);
        if ($key !== false) {
            unset($this->categoriesSocioProfessionnelles[$key]);
        }

        return $this;
    }

    /**
     * @return array<CategorieSocioProfessionnelle>
     */
    public function getCategoriesSocioProfessionnelles(): array
    {
        return $this->categoriesSocioProfessionnelles;
    }

    /**
     * @param array $contrats
     * @return Salarie
     */
    public function setContrats(array $contrats): Salarie
    {
        $this->removeAllContrats();
        foreach ($contrats as $contrat) {
            if ($contrat instanceof Contrat) {
                $this->addContrat($contrat);
            }
        }

        return $this;
    }

    /**
     * @return Salarie
     */
    public function removeAllContrats(): Salarie
    {
        $this->contrats = [];

        return $this;
    }

    /**
     * @param Contrat $contrat
     * @return Salarie
     */
    public function addContrat(Contrat $contrat): Salarie
    {
        $this->contrats[] = $contrat;

        return $this;
    }

    /**
     * @param Contrat $contrat
     * @return Salarie
     */
    public function removeContrat(Contrat $contrat): Salarie
    {
        $key = array_search($contrat, $this->getContrats(), true);
        if ($key !== false) {
            unset($this->contrats[$key]);
        }

        return $this;
    }

    /**
     * @return array<Contrat>
     */
    public function getContrats(): array
    {
        return $this->contrats;
    }

    /**
     * @param array $documents
     * @return Salarie
     */
    public function setDocuments(array $documents): Salarie
    {
        $this->removeAllDocuments();
        foreach ($documents as $document) {
            if ($document instanceof Document) {
                $this->addDocument($document);
            }
        }

        return $this;
    }

    /**
     * @return Salarie
     */
    public function removeAllDocuments(): Salarie
    {
        $this->documents = [];

        return $this;
    }

    /**
     * @param Document $document
     * @return Salarie
     */
    public function addDocument(Document $document): Salarie
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * @param Document $document
     * @return Salarie
     */
    public function removeDocument(Document $document): Salarie
    {
        $key = array_search($document, $this->getDocuments(), true);
        if ($key !== false) {
            unset($this->documents[$key]);
        }

        return $this;
    }

    /**
     * @return array<Document>
     */
    public function getDocuments(): array
    {
        return $this->documents;
    }
}