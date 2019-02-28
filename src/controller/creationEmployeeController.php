<?php
require_once('../DAO/employeeDAO.php');
$bdd = connectBDD();

$formValidated = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST["Gender"] == "")
		{$formValidated = false;}

	if (trim($_POST["LastName"]) == "")
		{$formValidated = false;}

	if (trim($_POST["FirstName"]) == "")
		{$formValidated = false;}

	if (trim($_POST["Nationality"]) == "")
		{$formValidated = false;}

	if (trim($_POST["Birthdate"]) == "")
		{$formValidated = false;}

	if (trim($_POST["Birthplace"]) == "")
		{$formValidated = false;}

	if (trim($_POST["Address"]) == "")
		{$formValidated = false;}

	if (trim($_POST["City"]) == "")
		{$formValidated = false;}

	if ($_POST["FamilyStatus"] == "")
		{$formValidated = false;}

	if ($_POST["Children"] == 1){
		if($_POST["LastNameChild"] != "" && $_POST["FirstNameChild"] != "" && $_POST["BirthdateChild"] != ""){
			$lastNameChild = $_POST["LastNameChild"];
			$firstNameChild = $_POST["FirstNameChild"];
			$birthdateChild = $_POST["BirthdateChild"];

			$arrayChild = array( $lastNameChild, $firstNameChild, $birthdateChild );
	
			if (count($lastNameChild) == count($firstNameChild) && count($lastNameChild) == count($birthdateChild)) {
				$count = count($lastNameChild);
				for ($i = 0; $i < $count; $i++) {
					if ($lastNameChild[$i] == "" || $firstNameChild[$i] == "" || $birthdateChild[$i] == "") {
						$formValidated = false;
						echo 'la ligne enfant est incorrect <br>';
					}
				}	
			}else {
				$formValidated = false;
			}
		}
		else {
			$formValidated = false;
		}
	}

	if (checkEmail($_POST["EmailProfessional"])) {
		echo 'Le mail professionnel est correct <br>';
	} else {
		echo 'Le mail professionnelle est incorrect <br>';
		$formValidated = false;
	}
	if (checkEmail($_POST["EmailPersonal"], false)) {
		echo 'Le mail personnel est correct <br>';
	} else {
		echo 'Le mail personnel est incorrect <br>';
		$formValidated = false;
	}
	if (checkFormatDate($_POST["Birthdate"])) {
		echo 'La date de naissance est correcte <br>';
	} else {
		echo 'La date de naissance est incorrecte <br>';
		$formValidated = false;
	}
	if (checkSocialSecurityNumber($_POST["SocialSecurityNumber"])) {
		echo 'Le numéro de sécu est correct <br>';
	} else {
		echo 'Le numéro de sécu est incorrect <br>';
		$formValidated = false;
	}

	if (checkDataRepository($_POST["SocialProfessionalGroup"], "categorie_socio_professionnelle")){
		echo 'la donnée est correct <br>';
	}else {
		echo 'La donnée est incorrect <br>';
		$formValidated = false;
	}

	if (checkDataRepository($_POST["EmploymentContract"], "type_contrat")){
		echo 'la donnée est correct <br>';
	}else {
		echo 'La donnée est incorrect <br>';
		$formValidated = false;
	}

	if (checkDataRepository($_POST["InformationJob"], "renseignement_poste")){
		echo 'la donnée est correct <br>';
	}else {
		echo 'La donnée est incorrect <br>';
		$formValidated = false;
	}
	if (checkSalary($_POST["Salary"])) {
		echo 'Le salaire est correct <br>';
	} else {
		echo 'Le salaire est incorrect <br>';
		$formValidated = false;
	}
	if (checkPostalCode($_POST["PostalCode"])) {
		echo 'Le code postal est correct <br>';
	} else {
		echo 'Le code postal est incorrect <br>';
		$formValidated = false;
	}
	if (checkPhone($_POST["Phone"])) {
		echo 'Le numéro de tel est correct <br>';
	} else {
		echo 'Le numéro de tel est incorrect <br>';
		$formValidated = false;
	}

	if($_POST["ForeignWorker"] == 1){
		if ($_POST["PermitWork"] != "" && checkFormatDate($_POST["PermitWorkDate"]) && checkResidencePermitNumber($_POST["ResidencePermitNumber"]) && checkFormatDate($_POST["DeadLinePermit"])) {
			echo 'le formulaire travailleur étranger est correct';
		} else {
			echo 'le formulaire est incorrect';
			$formValidated = false;
		}
	}

	if ($_POST["LastNameContact"] != "" && $_POST["FirstNameContact"] != "" && $_POST["PhoneNumberContact"] != ""){
		$lastNameContact = $_POST["LastNameContact"];
		$firstNameContact = $_POST["FirstNameContact"];
		$phoneNumberContact = $_POST["PhoneNumberContact"];

		$arrayContact = array( $lastNameContact, $firstNameContact, $phoneNumberContact );
	
		if (count($lastNameContact) == count($firstNameContact) && count($lastNameContact) == count($phoneNumberContact)) {
			$count = count($lastNameContact);
			for ($i = 0; $i < $count; $i++) {
				if ($lastNameContact[$i] == "" || $firstNameContact[$i] == "" || $phoneNumberContact[$i] == "") {
					$formValidated = false;
					echo 'la ligne contact est correct <br>';
				}
			}
		}else {
			$formValidated = false;
		}
	}
	else {
		$formValidated = false;
	}


	if($formValidated == true){
		createEmployee($bdd);
	}
	else { echo'le formulaire est incorrect'; }
}

function checkEmail($email, $required = true){
	return $required ? filter_var($email, FILTER_VALIDATE_EMAIL) : trim($email) == "" || filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkFormatDate($date, $format = 'Y-m-d') {
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

function checkSocialSecurityNumber($number) {
	return strlen($number) == 15;
}

function checkSalary($salary) {
	return is_numeric($salary) && strlen($salary) <= 6;
}

function checkPostalCode($postalcode) {
	return is_numeric($postalcode) && strlen($postalcode) == 5;
}

function checkPhone($phone){
	return is_numeric($phone) && strlen($phone) == 10;
}

function checkResidencePermitNumber($number){
	return is_numeric($number) && strlen($number) == 10;
}

function checkButtonRadio($radio){
	if ($_POST[$radio] == null) {
		$_POST[$radio] = 1;
	}
}

function checkDataRepository($value, $tableName){
	return array_key_exists($value, getDataRepository($tableName));
}
?>