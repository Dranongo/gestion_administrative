<?php
	return [
        'id' => 'id',
        'code' => 'code',
        'nom' => 'nom',
        'salaries' => [
            'tableName' => 'salarie_categorie_socio_professionnelle',
            'className' => 'Salarie',
            'foreignKey' => 'id_categorie_socio_professionnelle',
            'otherForeignKey' => 'id_salarie',
            'otherFields' => [
                'dateDebutCategorieSocioProfessionnelle' => 'date_debut',
                'dateFinCategorieSocioProfessionnelle' => 'date_fin'
            ],
            //'orderBy' => [
            //    'dateDebutCategorieSocioProfessionnelle' => DESC
            //],
            'mapped' => false
        ]
    ];