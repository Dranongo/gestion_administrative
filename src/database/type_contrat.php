<?php
	return [
        'id' => 'id',
        'code' => 'code',
        'nom' => 'nom',
        'contrats' => [
            'tableName' => 'contrat',
            'foreignKey' => 'id_type_contrat',
            'orderBy' => [
                'date_debut' => 'DESC'
            ],
            'mapped' => false
        ]
    ];