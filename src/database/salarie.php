<?php
    return [
        'id' => 'id',
        'qualite' => 'qualite',
        'nom' => 'nom',
        'prenom' => 'prenom',
        'nomJeuneFille' => 'nom_jeune_fille',
        'nationalite' => 'nationalite',
        'dateNaissance' => 'date_naissance',
        'adresse' => 'adresse',
        'codePostal' => 'code_postal',
        'ville' => 'ville',
        'telephone' => 'telephone',
        'mailProfessionnel' => 'mail_professionnel',
        'mailPersonnel' => 'mail_personnel',
        'numeroSecuriteSociale' => 'numero_securite_sociale',
        'remuneration' => 'remuneration',
        'enPoste' => 'en_poste',
        'situationFamiliale' => 'situation_familiale',
        'langues' => 'langues_etrangeres',
        'autreActivite' => 'autre_activite',
        'detailActivite' => 'details_autre_activite',
        'autorisationTravailMineur' => 'autorisation_travail_mineur',
        'statutHandicap' => 'statut_handicap',
        'tauxInvalidite' => 'taux_invalidite',
        'formations' => [
            'tableName' => 'formation',
            'foreignKey' => 'id_salarie',
            'orderBy' => [
                'dateFin' => 'DESC'
            ],
            'mapped' => false
        ],
        'enfants' => [
            'tableName' => 'enfant',
            'foreignKey' => 'id_salarie',
            'orderBy' => [
                'dateNaissance' => 'DESC'
            ],
            'mapped' => false
        ],
        'contrats' => [
            'tableName' => 'contrat',
            'foreignKey' => 'id_salarie',
            'orderBy' => [
                'date_debut' => 'DESC'
            ],
            'mapped' => false
        ],
        'contactsUrgence' => [
            'tableName' => 'contact_urgence',
            'foreignKey' => 'id_salarie',
            'mapped' => false
        ],
        'documents' => [
            'tableName' => 'document',
            'foreignKey' => 'id_salarie',
            'mapped' => false
        ],
        'categoriesSocioProfessionnelles' => [
            'tableName' => 'salarie_categorie_socio_professionnelle',
            'className' => 'CategorieSocioProfessionnelle',
            'foreignKey' => 'id_salarie',
            'otherForeignKey' => 'id_categorie_socio_professionnelle',
            'otherFields' => [
                'dateDebutCategorieSocioProfessionnelle' => 'date_debut',
                'dateFinCategorieSocioProfessionnelle' => 'date_fin'
            ],
            'mapped' => true
        ]
    ];