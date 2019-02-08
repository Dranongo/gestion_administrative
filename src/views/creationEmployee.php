<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Accueil</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="../../public/js/jquery-3.3.1.min.js"></script>
		<script src="../../public/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			require_once('../include/header.php');
		?>

		<div class="container">
			<form>
				<div class="form-group">
					<label for="LastName">Nom</label>
					<input type="text" id="form-lastName" class="form-control" name="LastName" required>
					<div class="invalid-feedback">Veuillez insérer un nom</div>
				</div>

				<div class="form-group">
					<label for="FirstName">Prénom</label>
					<input type="text" id="form-firstName" class="form-control" name="FirstName" required>
					<div class="invalid-feedback">Veuillez insérer un prénom</div>
				</div>

				<div class="form-group">
					<label for="MaidenName">Nom de jeune Fille</label>
					<input type="text" id="form-maidenName" class="form-control" name="MaidenName">
				</div>

				<div class="form-group">
					<label for="Nationality">Nationnalité</label>
					<input type="text" id="form-nationality" class="form-control" name="Nationality" required>
					<div class="invalid-feedback">Veuillez insérer une nationalité</div>
				</div>

				<div class="form-group">
					<label for="Birthdate">Date de naissance</label>
					<input type="date" id="form-birthdate" class="form-control" name="Birthdate" required>
					<div class="invalid-feedback">Veuillez insérer une date</div>
				</div>

				<div class="form-group">
					<label for="Birthplace">Lieu de naissance</label>
					<input type="text" id="form-birthplace" class="form-control" name="Birthplace" required>
					<div class="invalid-feedback">Veuillez insérer un lieu de naissance</div>
				</div>

				<div class="form-group">
					<label for="Adress">Adresse</label>
					<input type="text" id="form-adress" class="form-control" name="Adress" required>
					<div class="invalid-feedback">Veuillez insérer un lieu de résidence</div>
				</div>

				<div class="form-group">
					<label for="PostalCode">Code postal</label>
					<input type="text" id="form-postalCode" class="form-control" name="PostalCode" required>
					<div class="invalid-feedback">Veuillez insérer un code postal du lieu de résidence</div>
				</div>

				<div class="form-group">
					<label for="EmailProfessional">E-mail professionnel</label>
					<input type="email" id="form-emailProfessional" class="form-control" name="EmailProfessional" required>
					<div class="invalid-feedback">Veuillez insérer un mail professionnel valide</div>
				</div>

				<div class="form-group">
					<label for="EmailPersonal">E-mail personnel</label>
					<input type="text" id="form-emailPersonnal" class="form-control" name="EmailPersonal" required>
					<div class="invalid-feedback">Veuillez insérer un mail personnel valide</div>
				</div>

				<div class="form-group">
					<label for="SocialSecurityNumber">Numéro de sécurité sociale</label>
					<input type="text" id="form-socialSecurityNumber" class="form-control" name="SocialSecurityNumber" required>
					<div class="invalid-feedback">Veuillez insérer un numéro de sécurité sociale valide</div>
				</div>

				<div class="form-group">
					<label for="Salary">Rémunération</label>
					<input type="text" id="form-salary" class="form-control" name="Salary" required>
					<div class="invalid-feedback">Veuillez insérer une rémunération</div>
				</div>

				<div class="form-group">
					<label for="FamilyStatus">Situation Familiale</label>
					<input type="text" id="form-familyStatus" class="form-control" name="FamilyStatus" required>
					<div class="invalid-feedback">Veuillez décrire la situation familiale (célibataire, mariage,...)</div>
				</div>

				<div class="form-group">
					<label for="Languages">Langues étrangères</label>
					<input type="text" id="form-languages" class="form-control" name="Languages">
				</div>

				<div class="form-check">
					<input type="checkbox" id="form-secondaryProfessionalActivity" class="form-check-input" name="SecondaryProfessionalActivity">
					<label class="form-check-label" for="SecondaryProfessionalActivity">Exerce-t-il/elle une activité professionnel secondaire ?</label>
				</div>

				<div class="form-group">
					<label for="DetailSecondaryActivity">Détails de cette activité</label>
					<input type="text" id="form-DetailSecondaryActivity" class="form-control" name="DetailSecondaryActivity">
				</div>

				<div class="form-check">
					<input type="checkbox" id="form-parentalPermission" class="form-check-input" name="ParentalPermission">
					<label class="form-check-label" for="ParentalPermission">A-t-il/elle une autorisation écrite de travail de ses responsables légaux ?</label>
				</div>

				<div class="form-check">
					<input type="checkbox" id="form-disabledWorker" class="form-check-input" name="DisabledWorker">
					<label class="form-check-label" for="DisabledWorker">Est-il reconnu comme travailleur handicapé ?</label>
				</div>

				<div class="form-group">
					<label for="DetailDisabledWorker">Détails du taux d'handicap</label>
					<input type="text" id="form-DetailDisabledWorker" class="form-control" name="DetailDisabledWorker">
				</div>
				<button class="btn btn-primary" type="submit">Enregistrer le salarié</button>
			</form>
		</div>


	</body>
</html>