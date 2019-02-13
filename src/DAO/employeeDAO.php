<?php
function connectBDD(){
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=gestion_administrative;charset=utf8', 'root', '');
		echo'Connecté';
		return $bdd;
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
}

function createEmployee($bdd){
	$nom_salarie = "";
	$prenom_salarie = "";
	$nom_jeune_fille_salarie = "";
	$nationalite_salarie = "";
	$date_naissance_salarie = "";
	$lieu_naissance_salarie = ""; 
	$adresse_salarie = "";
	$code_postal_salarie = "";
	$ville_habitat_salarie = "";
	$telephone_salarie = "";
	$mail_professionnel_salarie = ""; 
	$mail_personnel_salarie = "";
	$num_secu_salarie = ""; 
	$remuneration_salarie = ""; 
	$salarie_en_poste = "";
	$situation_familiale_salarie = "";
	$langues_etrangeres = "";
	$autre_activite_salarie = "";
	$details_autre_activite_salarie = "";
	$autorisation_travail_responsable_legaux = "";
	$statut_handicap_salarie = "";
	$taux_invalidite = "";

		$req = $bdd->prepare('INSERT into salarie(nom_salarie, 
			prenom_salarie, 
			nom_jeune_fille_salarie, 
			nationalite_salarie, 
			date_naissance_salarie, 
			lieu_naissance_salarie, 
			adresse_salarie, 
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
			VALUES (:nom_salarie, 
			:prenom_salarie, 
			:nom_jeune_fille_salarie, 
			:nationalite_salarie, 
			:date_naissance_salarie, 
			:lieu_naissance_salarie, 
			:adresse_salarie, 
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

	$req->bindParam(':nom_salarie', $nom_salarie);
	$req->bindParam(':prenom_salarie', $prenom_salarie);
	$req->bindParam(':nom_jeune_fille_salarie', $nom_jeune_fille_salarie);
	$req->bindParam(':nationalite_salarie', $nationalite_salarie);
	$req->bindParam(':date_naissance_salarie', $date_naissance_salarie);
	$req->bindParam(':lieu_naissance_salarie', $lieu_naissance_salarie);
	$req->bindParam(':adresse_salarie', $adresse_salarie);
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

	$nom_salarie = securite_bdd($_POST["LastName"], $bdd);
	$prenom_salarie = securite_bdd($_POST["FirstName"], $bdd);
	$nom_jeune_fille_salarie = securite_bdd($_POST["MaidenName"], $bdd);
	$nationalite_salarie = securite_bdd($_POST["Nationality"], $bdd);
	$date_naissance_salarie = securite_bdd($_POST["Birthdate"], $bdd);
	$lieu_naissance_salarie = securite_bdd($_POST["Birthplace"], $bdd); 
	$adresse_salarie = securite_bdd($_POST["Address"], $bdd);
	$code_postal_salarie = securite_bdd($_POST["PostalCode"], $bdd);
	$ville_habitat_salarie = securite_bdd($_POST["City"], $bdd);
	$telephone_salarie = $_POST["Phone"];
	$mail_professionnel_salarie = securite_bdd($_POST["EmailProfessional"], $bdd); 
	$mail_personnel_salarie = securite_bdd($_POST["EmailPersonal"], $bdd);
	$num_secu_salarie = securite_bdd($_POST["SocialSecurityNumber"], $bdd); 
	$remuneration_salarie = securite_bdd($_POST["Salary"], $bdd); 
	$salarie_en_poste = 1;
	$situation_familiale_salarie = securite_bdd($_POST["FamilyStatus"], $bdd);
	$langues_etrangeres = securite_bdd($_POST["Languages"], $bdd);
	$autre_activite_salarie = 1;
	$details_autre_activite_salarie = securite_bdd($_POST["DetailSecondaryActivity"], $bdd);
	$autorisation_travail_responsable_legaux = 1;
	$statut_handicap_salarie = 1;
	$taux_invalidite = securite_bdd($_POST["DetailDisabledWorker"], $bdd);

	$req->execute();
	$arr = $req->errorInfo();
	print_r($arr);

	echo'enregistré';
}

function securite_bdd($string, $bdd){
	if (ctype_digit($string)){
		$string = intval($string);
	}
	else {
		$string = mysqli_real_escape_string($bdd, $string);
		$string = addcslashes($string, '%_');
	}
	return $string;
}

?>