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
        ],
        'documentTypes' => [
            'tableName' => 'type_document_type_contrat',
            'className' => 'TypeDocument',
            'foreignKey' => 'id_type_contrat',
            'otherForeignKey' => 'id_type_document',
            'mapped' => false
        ]
    ];