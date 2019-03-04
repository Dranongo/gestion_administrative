<?php require_once('../DAO/employeeDAO.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Accueil</title>
		<link href="../../public/css/bootstrap.css" rel="stylesheet"/>
		<link href="../../public/css/tableChild.css" rel="stylesheet"/>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
		<script src="../../public/js/jquery-3.3.1.min.js"></script>
		<script src="../../public/js/bootstrap.min.js"></script>
		<script src="../../public/js/creationEmployee.js"></script>
	</head>
	<body>
		<?php
			require_once('../include/header.php');
		?>

		<div class="container">
			<form class="needs-validation" method="POST" action="../controller/creationEmployeeController.php" enctype="multipart/form-data" novalidate>

				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" id="GenderMale" name="Gender" value="Monsieur" required>
					<label class="custom-control-label" for="GenderMale">Monsieur</label>
				</div>

				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" id="GenderFemale" name="Gender" value="Madame">
					<label class="custom-control-label" for="GenderFemale">Madame</label>
					<div class="invalid-feedback">&nbsp;Veuillez sélectionner un genre</div>
				</div>

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
					<label for="Address2">Adresse Ligne 2</label>
					<input type="text" id="Address2" class="form-control" name="Address2">
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
					<input type="number" min="100000000000000" max="299999999999999" id="SocialSecurityNumber" class="form-control" name="SocialSecurityNumber" required>
					<div class="invalid-feedback">Veuillez insérer un numéro de sécurité sociale valide</div>
				</div>

				<div class="form-group">
					<select id="SocialProfessionalGroup" name="SocialProfessionalGroup" class="custom-select" >
						<option value="">Catégorie Socio-professionnelle</option>						
						<?php foreach (getDataRepository("categorie_socio_professionnelle") as $key => $value): ?>
							<option value="<?= $key ?>"><?= $value ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="StartingDateStatus">Date de début du statut social</label>
					<input type="date" id="StartingDateStatus" class="form-control" name="StartingDateStatus" required>
					<div class="invalid-feedback">Veuillez insérer une date</div>
				</div>

				<div class="form-group">
					<label for="EndingDateStatus">Date de fin du statut social</label>
					<input type="date" id="EndingDateStatus" class="form-control" name="EndingDateStatus" required>
					<div class="invalid-feedback">Veuillez insérer une date</div>
				</div>

				<div class="form-group">
					<select id="EmploymentContract" name="EmploymentContract" class="custom-select" >
						<option value="">Type de contrat</option>
						<?php foreach (getDataRepository("type_contrat") as $key => $value): ?>
							<option value="<?= $key ?>"><?= $value ?></option>
						<?php endforeach; ?>
						?>
					</select>
				</div>

				<div class="form-group">
					<select id="InformationJob" name="InformationJob" class="custom-select" >
						<option value="">Renseignement du poste</option>
						<?php foreach (getDataRepository("renseignement_poste") as $key => $value): ?>
							<option value="<?= $key ?>"><?= $value ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="StartingDateContract">Date de début du contrat</label>
					<input type="date" id="StartingDateContract" class="form-control" name="StartingDateContract" required>
					<div class="invalid-feedback">Veuillez insérer une date</div>
				</div>

				<div class="form-group">
					<label for="Salary">Rémunération</label>
					<input type="number" id="Salary" class="form-control" name="Salary" required>
					<div class="invalid-feedback">Veuillez insérer une rémunération</div>
				</div>

				<div class="form-group">
					<label>Le salarie est-il en poste ?</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="CurrentlyEmployedYes" name="CurrentlyEmployed" value="1" required>
						<label class="custom-control-label" for="CurrentlyEmployedYes">Oui</label>
					</div>

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="CurrentlyEmployedNo" name="CurrentlyEmployed" value="0">
						<label class="custom-control-label" for="CurrentlyEmployedNo">Non</label>
					</div>
				</div>

				<div class="form-group">
					<select id="FamilyStatus" name="FamilyStatus" class="custom-select" required>
						<option value="">Situation familiale</option>
						<option value="Célibataire">Célibataire</option>
						<option value="Concubin(e)">Concubin(e)</option>
						<option value="Pacsé(e)">Pacsé(e)</option>
						<option value="Marié(e)">Marié(e)</option>
					</select>
					<div class="invalid-feedback">Veuillez sélectionner votre situation familiale</div>
				</div>
				<div class="form-group">
					<label>Le salarié a-t-il des enfants ?</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="displayDiv('ListChildren');" class="custom-control-input" id="ChildrenYes" name="Children" value="1" required>
						<label class="custom-control-label" for="ChildrenYes">Oui</label>
					</div>

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="hideDiv('ListChildren'); removeRequiredDetailsForeignWorker();" class="custom-control-input" id="ChildrenNo" name="Children" value="0">
						<label class="custom-control-label" for="ChildrenNo">Non</label>
					</div>
				</div>

				<div class="form-group" id="ListChildren" style="display: none;">
					<label class="form-label" for="ListChildren">Renseignement des enfants</label>

					<div id="table-child" class="table-editable">
						<span class="table-add-child glyphicon glyphicon-plus"></span>
						<table class="table text-center">
							<thead>	
								<tr>
									<th class="text-center">Nom</th>
									<th class="text-center">Prénom</th>
									<th class="text-center">Date de naissance</th>
								</tr>
							</thead>
							<tbody>					
								<tr class="hide">
									<td><input class="lastName form-control" type="text" data-name="LastNameChild[%%d%%]"></td>
									<td><input class="firstName form-control" type="text" data-name="FirstNameChild[%%d%%]"></td>
									<td><input class="birthdate form-control" type="date" data-name="BirthdateChild[%%d%%]"></td>
									<td><span class="table-remove-child glyphicon glyphicon-remove"></span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="form-group">
					<label for="Languages">Langues étrangères</label>
					<textarea name="Languages" id="Languages" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<label>Exerce-t-il/elle une activité professionnel secondaire ?</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="displayDiv('DetailSecondaryActivity');" class="custom-control-input" id="SecondaryProfessionalActivityYes" name="SecondaryProfessionalActivity" value="1" required>
						<label class="custom-control-label" for="SecondaryProfessionalActivityYes">Oui</label>
					</div>

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="hideDiv('DetailSecondaryActivity');" class="custom-control-input" id="SecondaryProfessionalActivityNo" name="SecondaryProfessionalActivity" value="0">
						<label class="custom-control-label" for="SecondaryProfessionalActivityNo">Non</label>
					</div>
				</div>

				<div class="form-group" id="DetailSecondaryActivity" style="display: none;">
					<label for="DetailSecondaryActivity">Détails de cette activité</label>
					<input type="text" id="DetailSecondaryActivity" class="form-control" name="DetailSecondaryActivity">
				</div>

				<div class="form-group">
					<label>A-t-il/elle une autorisation écrite de travail de ses responsables légaux ?</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="ParentalPermitYes" name="ParentalPermit" value="1" required>
						<label class="custom-control-label" for="ParentalPermitYes">Oui</label>
					</div>

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="ParentalPermitNo" name="ParentalPermit" value="0">
						<label class="custom-control-label" for="ParentalPermitNo">Non</label>
					</div>
				</div>

				<div class="form-group">
					<label>Est-il reconnu comme travailleur handicapé ?</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="displayDiv('DetailDisabledWorker');" class="custom-control-input" id="DisabledWorkerYes" name="DisabledWorker" value="1" required>
						<label class="custom-control-label" for="DisabledWorkerYes">Oui</label>
					</div>

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="hideDiv('DetailDisabledWorker');" class="custom-control-input" id="DisabledWorkerNo" name="DisabledWorker" value="0">
						<label class="custom-control-label" for="DisabledWorkerNo">Non</label>
					</div>
				</div>

				<div class="form-group" id="DetailDisabledWorker" style="display: none;">
					<label for="DetailDisabledWorker">Détails du taux d'handicap</label>
					<input type="text" id="DetailDisabledWorker" class="form-control" name="DetailDisabledWorker">
				</div>

				<div class="form-group">
					<label>A-t-il le statut de travailleur étranger ?</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="displayDiv('DetailForeignWorker'); setRequiredDetailsForeignWorker();" class="custom-control-input" id="ForeignWorkeYes" name="ForeignWorker" value="1" required>
						<label class="custom-control-label" for="ForeignWorkeYes">Oui</label>
					</div>

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" onclick="hideDiv('DetailForeignWorker'); removeRequiredDetailsForeignWorker();" class="custom-control-input" id="ForeignWorkerNo" name="ForeignWorker" value="0">
						<label class="custom-control-label" for="ForeignWorkerNo">Non</label>
					</div>
				</div>

				<div class="form-group" id="DetailForeignWorker" style="display: none;">
					<label class="form-label" for="DetailForeignWorker">Renseignement du travailleur étranger</label>

					<div class="form-group">
						<label>A-t-il une permission de travail ?</label>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="PermitWorkYes" name="PermitWork" value="1">
							<label class="custom-control-label" for="PermitWorkYes">Oui</label>
						</div>

						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="PermitWorkNo" name="PermitWork" value="0">
							<label class="custom-control-label" for="PermitWorkNo">Non</label>
							<div class="invalid-feedback">&nbsp;Veuillez sélectionner une réponse</div>
						</div>
					</div>

					<div class="form-group">
						<label for="PermitWorkDate">Date d'autorisation d'embauche</label>
						<input type="date" id="PermitWorkDate" class="form-control" name="PermitWorkDate">
						<div class="invalid-feedback">Veuillez insérer une date</div>
					</div>
					<div class="form-group">
						<label for="ResidencePermitNumber">Numéro de carte de séjour</label>
						<input type="number" id="ResidencePermitNumber" class="form-control" name="ResidencePermitNumber" min="1000000000" max="9999999999">
						<div class="invalid-feedback">Veuillez insérer une numéro</div>
					</div>
					<div class="form-group">
						<label for="DeadLinePermit">Date limite de validité du séjour</label>
						<input type="date" id="DeadLinePermit" class="form-control" name="DeadLinePermit">
						<div class="invalid-feedback">Veuillez insérer une date</div>
					</div>
				</div>
				<div class="form-group" id="ListContact">
					<label class="form-label" for="ListContact">Renseignement des contacts d'urgence</label>

					<div id="table-contact" class="table-editable">
						<span class="table-add-contact glyphicon glyphicon-plus"></span>
						<table class="table text-center">
							<thead>	
								<tr>
									<th class="text-center">Nom</th>
									<th class="text-center">Prénom</th>
									<th class="text-center">Lien</th>
									<th class="text-center">Numéro de téléphone</th>
								</tr>
							</thead>
							<tbody>					
								<tr class="contact">
									<td><input class="lastName form-control" type="text" data-name="LastNameContact[%%d%%]"></td>
									<td><input class="firstName form-control" type="text" data-name="FirstNameContact[%%d%%]"></td>
									<td><input class="relationship form-control" type="text" data-name="RelationshipContact[%%d%%]"></td>
									<td><input class="phoneNumber form-control" type="number" data-name="PhoneNumberContact[%%d%%]"></td>
								</tr>
								<tr class="hide">
									<td><input class="lastName form-control" type="text" data-name="LastNameContact[%%d%%]"></td>
									<td><input class="firstName form-control" type="text" data-name="FirstNameContact[%%d%%]"></td>
									<td><input class="relationship form-control" type="text" data-name="RelationshipContact[%%d%%]"></td>
									<td><input class="phoneNumber form-control" type="number" data-name="PhoneNumberContact[%%d%%]"></td>
									<td><span class="table-remove-contact glyphicon glyphicon-remove"></span></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>

				<div class="form-group" id="ListEducation">
					<label class="form-label" for="ListEducation">Formation et Expériences professionnelles</label>

					<div id="table-education" class="table-editable">
						<span class="table-add-education glyphicon glyphicon-plus"></span>
						<table class="table text-center">
							<thead>	
								<tr>
									<th class="text-center">Formation</th>
									<th class="text-center">Niveau</th>
									<th class="text-center">Organisme</th>
									<th class="text-center">Lieu</th>
									<th class="text-center">Début de la formation</th>
									<th class="text-center">Fin de la formation</th>
									<th class="text-center">Diplôme obtenu</th>
								</tr>
							</thead>
							<tbody>					
								<tr class="hide">
									<td><input class="course form-control" type="text" data-name="Course[%%d%%]"></td>
									<td>
										<select class="courseListLevel form-control" data-name="CourseListLevel[%%d%%]">
											<option value="">Niveau</option>
											<option value="Niveau I">Niveau I</option>
											<option value="Niveau II">Niveau II</option>
											<option value="Niveau III">Niveau III</option>
											<option value="Niveau IV">Niveau IV</option>
											<option value="Niveau V">Niveau V</option>
											<option value="Niveau V bis et VI">Niveau V bis et VI</option>
										</select>
									</td>
									<td><input class="courseInstitution form-control" type="text" data-name="CourseInstitution[%%d%%]"></td>
									<td><input class="coursePlace form-control" type="text" data-name="CoursePlace[%%d%%]"></td>
									<td><input class="courseBeginning form-control" type="date" data-name="CourseBeginning[%%d%%]"></td>
									<td><input class="courseEnding form-control" type="date" data-name="CourseEnding[%%d%%]"></td>
									<td><input class="graduate form-check-input" type="checkbox" data-name="Graduate[%%d%%]" value="1"></td>
									<td><span class="table-remove-education glyphicon glyphicon-remove"></span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="form-group" id="LabelAttachments">
					<label class="form-label" for="LabelAttachments">Document et pièces à fournir</label>

					<div id="table-attachment" class="table-editable">
						<span class="table-add-attachment glyphicon glyphicon-plus"></span>
						<table class="table text-center">
							<thead>	
								<tr>
									<th class="text-center">Document</th>
									<th class="text-center">Nom du document</th>
									<th class="text-center">Type de Document</th>
								</tr>
							</thead>
							<tbody>					
								<tr class="hide">
									<td><input type="file" class="fileAttachment form-control" data-name="FileAttachment[%%d%%]"></td>
									<td><input type="text" class="nameAttachment form-control" data-name="NameAttachment[%%d%%]"></td>
									<td>
										<select class="typeAttachement custom-select" data-name="TypeAttachment[%%d%%]" >
											<option value="">Type de Document</option>
												<?php foreach (getDataRepository("type_document") as $key => $value): ?>
													<option value="<?= $key ?>"><?= $value ?></option>
												<?php endforeach; ?>
										</select>
									</td>
									<td><span class="table-remove-attachment glyphicon glyphicon-remove"></span></td>
								</tr>
							</tbody>
						</table>
					</div>

				<button id="suivant" class="btn btn-primary" type="submit">Enregistrer le salarié</button>
			</form>
		</div>
		<script type="text/javascript" src="../../public/js/createRowTable.js"></script>
		<script type="text/javascript" src="../../public/js/generateName.js"></script>
	</body>
</html>