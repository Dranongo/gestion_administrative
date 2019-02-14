<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Accueil</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="../../public/js/jquery-3.3.1.min.js"></script>
		<script src="../../public/js/bootstrap.min.js"></script>
		<script src="../../public/js/creationEmployee.js"></script>

	</head>
	<body>
		<?php
			require_once('../include/header.php');
		?>

		<div class="container">
			<form class="needs-validation" method="POST" action="../controller/creationEmployeeController.php" novalidate>
				<div class="form-group">
					<label for="LastName">Nom</label>
					<input type="text" id="LastName" class="form-control" name="LastName" required>
					<div class="invalid-feedback">Veuillez insérer un nom</div>
				</div>

				<div class="form-group">
					<label for="FirstName">Prénom</label>
					<input type="text" id="FirstName" class="form-control" name="FirstName" required>
					<div class="invalid-feedback">Veuillez insérer un prénom</div>
				</div>

				<div class="form-group">
					<label for="MaidenName">Nom de jeune Fille</label>
					<input type="text" id="form-maidenName" class="form-control" name="MaidenName">
				</div>

				<div class="form-group">
					<label for="Nationality">Nationnalité</label>
					<input type="text" id="Nationality" class="form-control" name="Nationality" required>
					<div class="invalid-feedback">Veuillez insérer une nationalité</div>
				</div>

				<div class="form-group">
					<label for="Birthdate">Date de naissance</label>
					<input type="date" id="Birthdate" class="form-control" name="Birthdate" required>
					<div class="invalid-feedback">Veuillez insérer une date</div>
				</div>

				<div class="form-group">
					<label for="Birthplace">Lieu de naissance</label>
					<input type="text" id="Birthplace" class="form-control" name="Birthplace" required>
					<div class="invalid-feedback">Veuillez insérer un lieu de naissance</div>
				</div>

				<div class="form-group">
					<label for="Address">Adresse</label>
					<input type="text" id="Address" class="form-control" name="Address" required>
					<div class="invalid-feedback">Veuillez insérer un lieu de résidence</div>
				</div>

				<div class="form-group">
					<label for="PostalCode">Code postal</label>
					<input type="number" id="PostalCode" class="form-control" name="PostalCode" required>
					<div class="invalid-feedback">Veuillez insérer un code postal du lieu de résidence</div>
				</div>

				<div class="form-group">
					<label for="City">Ville</label>
					<input type="text" id="City" class="form-control" name="City" required>
					<div class="invalid-feedback">Veuillez ajouter une ville</div>
				</div>

				<div class="form-group">
					<label for="Phone">Téléphone</label>
					<input type="tel number" id="Phone" class="form-control" name="Phone" required>
					<div class="invalid-feedback">Veuillez renseigner le numéro de téléphone du salarié</div>
				</div>

				<div class="form-group">
					<label for="EmailProfessional">E-mail professionnel</label>
					<input type="email" id="EmailProfessional" class="form-control" name="EmailProfessional" required>
					<div class="invalid-feedback">Veuillez insérer un mail professionnel valide</div>
				</div>

				<div class="form-group">
					<label for="EmailPersonal">E-mail personnel</label>
					<input type="email" id="EmailPersonal" class="form-control" name="EmailPersonal" required>
					<div class="invalid-feedback">Veuillez insérer un mail personnel valide</div>
				</div>

				<div class="form-group">
					<label for="SocialSecurityNumber">Numéro de sécurité sociale</label>
					<input type="number" min="100000000000000" max="200000000000000" id="SocialSecurityNumber" class="form-control" name="SocialSecurityNumber" required>
					<div class="invalid-feedback">Veuillez insérer un numéro de sécurité sociale valide</div>
				</div>

				<div class="form-group">
					<label for="Salary">Rémunération</label>
					<input type="number" id="Salary" class="form-control" name="Salary" required>
					<div class="invalid-feedback">Veuillez insérer une rémunération</div>
				</div>

				<div class="form-check">
					<label class="form-radio-inline" for="CurrentlyEmployed">Le salarié est-il en poste ?</label>
					<input type="radio" id="CurrentlyEmployed" class="form-radio-input" name="CurrentlyEmployed">Oui
					<input type="radio" id="CurrentlyEmployed" class="form-radio-input" name="CurrentlyEmployed">Non
				</div>

				<div class="form-group">
					<label for="FamilyStatus">Situation Familiale</label>
					<input type="text" id="FamilyStatus" class="form-control" name="FamilyStatus" required>
					<div class="invalid-feedback">Veuillez décrire la situation familiale (célibataire, mariage,...)</div>
				</div>

				<div class="form-group">
					<label for="Languages">Langues étrangères</label>
					<textarea name="Languages" id="Languages" class="form-control"></textarea>
				</div>

				<div class="form-check">
					<label class="form-radio-inline" for="SecondaryProfessionalActivity">Exerce-t-il/elle une activité professionnel secondaire ?</label>
					<input type="radio" onclick="displayDiv('DetailSecondaryActivity');" id="SecondaryProfessionalActivity" class="form-radio-input" name="SecondaryProfessionalActivity">Oui
					<input type="radio" onclick="hideDiv('DetailSecondaryActivity');" id="SecondaryProfessionalActivity" class="form-radio-input" name="SecondaryProfessionalActivity">Non
				</div>

				<div class="form-group" id="DetailSecondaryActivity" style="display: none;">
					<label for="DetailSecondaryActivity">Détails de cette activité</label>
					<input type="text" id="DetailSecondaryActivity" class="form-control" name="DetailSecondaryActivity">
				</div>

				<div class="form-check">
					<label class="form-radio-inline" for="ParentalPermission">A-t-il/elle une autorisation écrite de travail de ses responsables légaux ?</label>
					<input type="radio" id="ParentalPermission" class="form-radio-input" name="ParentalPermission">Oui
					<input type="radio" id="ParentalPermission" class="form-radio-input" name="ParentalPermission">Non
				</div>

				<div class="form-check">
					<label class="form-radio-inline" for="DisabledWorker">Est-il reconnu comme travailleur handicapé ?</label>
					<input type="radio" onclick="displayDiv('DetailDisabledWorker');" id="DisabledWorker" class="form-radio-input" name="DisabledWorker">Oui
					<input type="radio" onclick="hideDiv('DetailDisabledWorker');" id="DisabledWorker" class="form-radio-input" name="DisabledWorker">Non
				</div>

				<div class="form-group" id="DetailDisabledWorker" style="display: none;">
					<label for="DetailDisabledWorker">Détails du taux d'handicap</label>
					<input type="text" id="DetailDisabledWorker" class="form-control" name="DetailDisabledWorker">
				</div>
				<button class="btn btn-primary" type="submit">Enregistrer le salarié</button>
			</form>
		</div>
	</body>
</html>