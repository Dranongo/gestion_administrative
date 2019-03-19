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
        ]
    ];