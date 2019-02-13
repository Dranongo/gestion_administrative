<?php
function connectBDD(){
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=gestion_administrative;charset=utf8', 'root', '');
		echo'Connecté';

		$req = $bdd->prepare('INSERT into salarie(nom_salarie, prenom_salarie, nom_jeune_fille_salarie, nationalite_salarie, date_naissance_salarie, lieu_naissance_salarie, adresse_salarie, code_postal_salarie, ville_habitat_salarie, telephone_salarie, mail_professionel_salarie, mail_personnel_salarie, num_secu_salarie, remuneration_salarie, salarie_en_poste, situation_familiale_salarie, langues_etrangeres) VALUES(:nom_salarie, :prenom_salarie, :nom_jeune_fille_salarie, :nationalite_salarie, :date_naissance_salarie, :lieu_naissance_salarie, :adresse_salarie, :code_postal_salarie, :ville_habitat_salarie, :telephone_salarie, :mail_professionel_salarie, :mail_personnel_salarie, :num_secu_salarie, :remuneration_salarie, :salarie_en_poste, :situation_familiale_salarie, :langues_etrangeres, :autre_activite_salarie, :details_autre_activite_salarie, :autorisation_travail_responsable_legaux, :statut_handicap_salarie, :taux_invalidite)');

		/*$req->execute(array(
			'nom_salarie' => $_POST["LastName"],
			'prenom_salarie' => $_POST["FirstName"],
			'nom_jeune_fille_salarie' => $_POST["MaidenName"],
			'nationalite_salarie' => $_POST["Nationality"],
			'date_naissance_salarie' => $_POST["Birthdate"],
			'lieu_naissance_salarie' => $_POST["Birthplace"], 
			'adresse_salarie' => $_POST["Address"], 
			'code_postal_salarie' => $_POST["PostalCode"], 
			'ville_habitat_salarie' => $_POST["City"], 
			'telephone_salarie' => $_POST["Phone"], 
			'mail_professionel_salarie' => $_POST["EmailProfessional"], 
			'mail_personnel_salarie' => $_POST["EmailPersonal"], 
			'num_secu_salarie' => $_POST["SocialSecurityNumber"], 
			'remuneration_salarie' => $_POST["Salary"], 
			'salarie_en_poste' => 1,
			'situation_familiale_salarie' => $_POST["FamilyStatus"],
			'langues_etrangeres' => $_POST['Languages'],
			'autre_activite_salarie' => 1,
			'details_autre_activite_salarie' => $_POST['DetailSecondaryActivity'],
			'autorisation_travail_responsable_legaux' => 1,
			'statut_handicap_salarie' => 1,
			'taux_invalidite' => $_POST['DetailDisabledWorker']
		));*/
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
		$req->bindParam(':mail_professionel_salarie', $mail_professionel_salarie);
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

		$nom_salarie = $_POST["LastName"];
		$prenom_salarie = $_POST["FirstName"];
		$nom_jeune_fille_salarie = $_POST["MaidenName"];
		$nationalite_salarie = $_POST["Nationality"];
		$date_naissance_salarie = $_POST["Birthdate"];
		$lieu_naissance_salarie = $_POST["Birthplace"]; 
		$adresse_salarie = $_POST["Address"];
		$code_postal_salarie = $_POST["PostalCode"];
		$ville_habitat_salarie = $_POST["City"];
		$telephone_salarie = $_POST["Phone"];
		$mail_professionel_salarie = $_POST["EmailProfessional"]; 
		$mail_personnel_salarie = $_POST["EmailPersonal"];
		$num_secu_salarie = $_POST["SocialSecurityNumber"]; 
		$remuneration_salarie = $_POST["Salary"]; 
		$salarie_en_poste = 1;
		$situation_familiale_salarie = $_POST["FamilyStatus"];
		$langues_etrangeres = $_POST["Languages"];
		$autre_activite_salarie = 1;
		$details_autre_activite_salarie = $_POST["DetailSecondaryActivity"];
		$autorisation_travail_responsable_legaux = 1;
		$statut_handicap_salarie = 1;
		$taux_invalidite = $_POST["DetailDisabledWorker"];

		$req->execute();


		echo'enregistré';

		/*$requete = "SELECT nom_salarie from salarie";
		mysql_query($requete) or exit(mysql_error());*/
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
}

?>