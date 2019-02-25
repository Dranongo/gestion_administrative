<?php
function connectBDD(){
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=gestion_administrative;charset=utf8', 'root', '');
		//echo'Connecté';
		return $bdd;
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
}

function createEmployee($bdd){

	$qualite_salarie = securite_bdd($_POST["Gender"], $bdd);
	$nom_salarie = securite_bdd($_POST["LastName"], $bdd);
	$prenom_salarie = securite_bdd($_POST["FirstName"], $bdd);
	$nom_jeune_fille_salarie = securite_bdd($_POST["MaidenName"], $bdd);
	$nationalite_salarie = securite_bdd($_POST["Nationality"], $bdd);
	$date_naissance_salarie = securite_bdd($_POST["Birthdate"], $bdd);
	$lieu_naissance_salarie = securite_bdd($_POST["Birthplace"], $bdd); 
	$adresse_salarie = securite_bdd($_POST["Address"], $bdd);
	$adresse2_salarie = securite_bdd($_POST["Address2"], $bdd);
	$code_postal_salarie = securite_bdd($_POST["PostalCode"], $bdd);
	$ville_habitat_salarie = securite_bdd($_POST["City"], $bdd);
	$telephone_salarie = securite_bdd($_POST["Phone"], $bdd);
	$mail_professionnel_salarie = securite_bdd($_POST["EmailProfessional"], $bdd); 
	$mail_personnel_salarie = securite_bdd($_POST["EmailPersonal"], $bdd);
	$num_secu_salarie = securite_bdd($_POST["SocialSecurityNumber"], $bdd); 
	$remuneration_salarie = securite_bdd($_POST["Salary"], $bdd); 
	$salarie_en_poste = securite_bdd($_POST["CurrentlyEmployed"], $bdd);
	$situation_familiale_salarie = securite_bdd($_POST["FamilyStatus"], $bdd);
	$langues_etrangeres = securite_bdd($_POST["Languages"], $bdd);
	$autre_activite_salarie = securite_bdd($_POST["SecondaryProfessionalActivity"], $bdd);;
	$details_autre_activite_salarie = securite_bdd($_POST["DetailSecondaryActivity"], $bdd);
	$autorisation_travail_responsable_legaux = securite_bdd($_POST["ParentalPermit"], $bdd);;
	$statut_handicap_salarie = securite_bdd($_POST["DisabledWorker"], $bdd);;
	$taux_invalidite = securite_bdd($_POST["DetailDisabledWorker"], $bdd);

	$req = $bdd->prepare('INSERT into salarie(qualite_salarie,
		nom_salarie, 
		prenom_salarie, 
		nom_jeune_fille_salarie, 
		nationalite_salarie, 
		date_naissance_salarie, 
		lieu_naissance_salarie, 
		adresse_salarie,
		adresse2_salarie, 
		code_postal_salarie, 
		ville_habitat_salarie, 
		telephone_salarie, 
		mail_professionnel_salarie, 
		mail_personnel_salarie, 
		num_secu_salarie, 
		remuneration_salarie, 
		salarie_en_poste, 
		situation_familiale_salarie, 
		langues_etrangeres, 
		autre_activite_salarie,
		details_autre_activite_salarie,
		autorisation_travail_responsable_legaux, 
		statut_handicap_salarie, 
		taux_invalidite) 
		VALUES (:qualite_salarie,
		:nom_salarie, 
		:prenom_salarie, 
		:nom_jeune_fille_salarie, 
		:nationalite_salarie, 
		:date_naissance_salarie, 
		:lieu_naissance_salarie, 
		:adresse_salarie,
		:adresse2_salarie, 
		:code_postal_salarie, 
		:ville_habitat_salarie, 
		:telephone_salarie, 
		:mail_professionnel_salarie, 
		:mail_personnel_salarie, 
		:num_secu_salarie, 
		:remuneration_salarie, 
		:salarie_en_poste, 
		:situation_familiale_salarie, 
		:langues_etrangeres, 
		:autre_activite_salarie, 
		:details_autre_activite_salarie, 
		:autorisation_travail_responsable_legaux, 
		:statut_handicap_salarie, 
		:taux_invalidite)');

	$req->bindParam(':qualite_salarie', $qualite_salarie);
	$req->bindParam(':nom_salarie', $nom_salarie);
	$req->bindParam(':prenom_salarie', $prenom_salarie);
	$req->bindParam(':nom_jeune_fille_salarie', $nom_jeune_fille_salarie);
	$req->bindParam(':nationalite_salarie', $nationalite_salarie);
	$req->bindParam(':date_naissance_salarie', $date_naissance_salarie);
	$req->bindParam(':lieu_naissance_salarie', $lieu_naissance_salarie);
	$req->bindParam(':adresse_salarie', $adresse_salarie);
	$req->bindParam(':adresse2_salarie', $adresse2_salarie);
	$req->bindParam(':code_postal_salarie', $code_postal_salarie);
	$req->bindParam(':ville_habitat_salarie', $ville_habitat_salarie);
	$req->bindParam(':telephone_salarie', $telephone_salarie);
	$req->bindParam(':mail_professionnel_salarie', $mail_professionnel_salarie);
	$req->bindParam(':mail_personnel_salarie', $mail_personnel_salarie);
	$req->bindParam(':num_secu_salarie', $num_secu_salarie);
	$req->bindParam(':remuneration_salarie', $remuneration_salarie);
	$req->bindParam(':salarie_en_poste', $salarie_en_poste);
	$req->bindParam(':situation_familiale_salarie', $situation_familiale_salarie);
	$req->bindParam(':langues_etrangeres', $langues_etrangeres);
	$req->bindParam(':autre_activite_salarie', $autre_activite_salarie);
	$req->bindParam(':details_autre_activite_salarie', $details_autre_activite_salarie);
	$req->bindParam(':autorisation_travail_responsable_legaux', $autorisation_travail_responsable_legaux);
	$req->bindParam(':statut_handicap_salarie', $statut_handicap_salarie);
	$req->bindParam(':taux_invalidite', $taux_invalidite);

	$req->execute();
	$arr = $req->errorInfo();
	print_r($arr);

	$lastInsertIdEmployee = $bdd->lastInsertId();

	if ($_POST["ForeignWorker"] == 1){
		setStatusForeignWorker($lastInsertIdEmployee, $bdd);
	}

	if ($_POST["SocialProfessionalGroup"] != ""){
		setSocialCategory($lastInsertIdEmployee, $bdd);
	}

	if ($_POST["InformationJob"] != "" && $_POST["EmploymentContract"] != ""){
		setJobContract($lastInsertIdEmployee, $bdd);
	}

	echo'enregistré';
}

function securite_bdd($string, $bdd){
	if (ctype_digit($string)){
		$string = intval($string);
	}
	else {
		$bdd->quote($string);
		$string = addcslashes($string, '%_');
	}
	return $string;
}

function setStatusForeignWorker($idSalarie, $bdd){
	$autorisation_travail = securite_bdd($_POST["PermitWork"], $bdd);
	$date_autorisation_embauche = securite_bdd($_POST["PermitWorkDate"], $bdd);
	$num_carte_sejour = securite_bdd($_POST["ResidencePermitNumber"], $bdd);
	$date_limite_validite = securite_bdd($_POST["DeadLinePermit"], $bdd);
	$id_salarie = securite_bdd($idSalarie, $bdd);

	$req = $bdd->prepare('INSERT into travailleur_etranger(autorisation_travail, 
		date_autorisation_embauche,
		num_carte_sejour,
		date_limite_validite,
		id_salarie) 
		VALUES (:autorisation_travail,
		:date_autorisation_embauche,
		:num_carte_sejour,
		:date_limite_validite,
		:id_salarie)'
	);

	$req->bindParam(':autorisation_travail', $autorisation_travail);
	$req->bindParam(':date_autorisation_embauche', $date_autorisation_embauche);
	$req->bindParam(':num_carte_sejour', $num_carte_sejour);
	$req->bindParam(':date_limite_validite', $date_limite_validite);
	$req->bindParam(':id_salarie', $id_salarie);

	$req->execute();
	$arr = $req->errorInfo();
	print_r($arr);

}

function getDataRepository($nameTable){
	$table = array();

	$bdd = new PDO('mysql:host=localhost;dbname=gestion_administrative;charset=utf8', 'root', '');
	$req = $bdd->prepare("SELECT * FROM ".$nameTable);

	$id = "id_" . $nameTable;
	$name = "nom_" . $nameTable;

	$req->execute();

	while($rows = $req->fetch()){
		$table[$rows[$id]] = $rows[$name];
	}

	return $table;
}

function setSocialCategory($idSalarie, $bdd){
	$id_salarie = securite_bdd($idSalarie, $bdd);
	$id_categorie_socio_professionnelle = securite_bdd($_POST["SocialProfessionalGroup"], $bdd);;
	$date_debut = securite_bdd($_POST["StartingDateStatus"], $bdd);
	$date_fin = securite_bdd($_POST["EndingDateStatus"], $bdd);

	$req = $bdd->prepare('INSERT into salarie_categorie_socio_professionnelle(id_salarie, 
		id_categorie_socio_professionnelle,
		date_debut,
		date_fin) 
		VALUES (:id_salarie, 
		:id_categorie_socio_professionnelle,
		:date_debut,
		:date_fin)'
	);

	$req->bindParam(':id_salarie', $id_salarie);
	$req->bindParam(':id_categorie_socio_professionnelle', $id_categorie_socio_professionnelle);
	$req->bindParam(':date_debut', $date_debut);
	$req->bindParam(':date_fin', $date_fin);

	$req->execute();
	$arr = $req->errorInfo();
	print_r($arr);
}

function setJobContract($idSalarie, $bdd){
	$id_salarie = securite_bdd($idSalarie, $bdd);
	$id_renseignement_poste = securite_bdd($_POST["InformationJob"], $bdd);;
	$id_type_contrat = securite_bdd($_POST["EmploymentContract"], $bdd);
	$date_entree_entreprise = securite_bdd($_POST["StartingDateContract"], $bdd);
	$date_fin_contrat = "";

	$req = $bdd->prepare('INSERT into salarie_renseignement_poste_type_contrat(id_salarie, 
		id_renseignement_poste,
		id_type_contrat,
		date_entree_entreprise,
		date_fin_contrat) 
		VALUES (:id_salarie, 
		:id_renseignement_poste,
		:id_type_contrat,
		:date_entree_entreprise,
		:date_fin_contrat)'
	);

	$req->bindParam(':id_salarie', $id_salarie);
	$req->bindParam(':id_renseignement_poste', $id_renseignement_poste);
	$req->bindParam(':id_type_contrat', $id_type_contrat);
	$req->bindParam(':date_entree_entreprise', $date_entree_entreprise);
	$req->bindParam(':date_fin_contrat', $date_fin_contrat);

	$req->execute();
	$arr = $req->errorInfo();
	print_r($arr);
}

function setChildren($idSalarie, $bdd){
	$nom_enfant = securite_bdd($_POST["LastNameChildren"], $bdd);
	$prenom_enfant = securite_bdd($_POST["FirstNameChildren"], $bdd);
	$date_naissance_enfant = securite_bdd($_POST["BirthdateChildren"], $bdd);
	$id_salarie = securite_bdd($idSalarie, $bdd);

	$req = $bdd->prepare('INSERT into enfant(nom_enfant, 
		prenom_enfant,
		date_naissance_enfant,
		id_salarie) 
		VALUES (:nom_enfant, 
		:prenom_enfant,
		:date_naissance_enfant,
		:id_salarie)'
	);

	$req->bindParam(':nom_enfant', $nom_enfant);
	$req->bindParam(':prenom_enfant', $prenom_enfant);
	$req->bindParam(':date_naissance_enfant', $date_naissance_enfant);
	$req->bindParam(':id_salarie', $id_salarie);

	$req->execute();
	$arr = $req->errorInfo();
	print_r($arr);
}
?>