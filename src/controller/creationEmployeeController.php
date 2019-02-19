<?php
require_once('../DAO/employeeDAO.php');
$bdd = connectBDD();

getSocialProfessionalGroup($bdd);

$formValidated = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST["Gender"] == "")
		{$formValidated = false;}

	if ($_POST["SocialProfessionalGroup"] == "")
		{$formValidated = false;}
	
	if ($_POST["EmploymentContract"] == "")
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

	if($formValidated == true){
		createEmployee($bdd);
	}
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
?>