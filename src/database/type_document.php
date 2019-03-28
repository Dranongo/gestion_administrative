<?php
	return [
        'id' => 'id',
        'code' => 'code',
        'nom' => 'nom',
        'statutEtranger' => 'statut_etranger',
        'documents' => [
            'tableName' => 'document',
            'foreignKey' => 'id_type_document',
            'mapped' => false
        ],
        'typesContrat' => [
            'tableName' => 'type_document_type_contrat',
            'className' => 'TypeContrat',
            'foreignKey' => 'id_type_document',
            'otherForeignKey' => 'id_type_contrat',
            'mapped' => true
        ]
    ];