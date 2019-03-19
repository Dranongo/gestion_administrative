<?php
	return [
        'id' => 'id',
        'code' => 'code',
        'nom' => 'nom',
        'contrats' => [
            'tableName' => 'contrat',
            'foreignKey' => 'id_renseignement_poste',
            'orderBy' => [
                'date_debut' => 'DESC'
            ],
            'mapped' => false
        ],
    ];