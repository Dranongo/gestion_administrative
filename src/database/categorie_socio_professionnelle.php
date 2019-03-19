<?php
	return [
        'id' => 'id',
        'code' => 'code',
        'nom' => 'nom',
        'salaries' => [
            'tableName' => 'salarie_categorie_socio_professionnelle',
            'foreignKey' => 'id_categorie_socio_professionnelle',
            'otherForeignKey' => 'id_salarie',
            'mapped' => false
        ]
    ];