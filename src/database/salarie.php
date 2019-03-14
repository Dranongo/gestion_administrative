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
            'tableName' => 'enfant',
            'foreignKey' => 'id_salarie',
            'orderBy' => [
                'dateNaissance' => 'ASC'
            ]
        ]
    ];