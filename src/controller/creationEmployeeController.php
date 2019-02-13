<?php
require('../DAO/employeeDAO.php');
$bdd = connectBDD();

$formValidated = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (trim($_POST["LastName"])==null)
		{$formValidated = false;}

	if (trim($_POST["LastName"])==null)
		{$formValidated = false;}

	if (trim($_POST["Nationality"])==null)
		{$formValidated = false;}

	if (trim($_POST["Birthdate"])==null)
		{$formValidated = false;}

	if (trim($_POST["Birthplace"])==null)
		{$formValidated = false;}

	if (trim($_POST["Address"])==null)
		{$formValidated = false;}

	if (trim($_POST["City"])==null)
		{$formValidated = false;}

	if (trim($_POST["FamilyStatus"])==null)
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
	if (checkBirthdate($_POST["Birthdate"])) {
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

	if($formValidated == true){
		
		createEmployee($bdd);
	}
}

function checkEmail($email, $required = true){
	return $required ? filter_var($email, FILTER_VALIDATE_EMAIL) : trim($email) || filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkBirthdate($date, $format = 'Y-m-d') {
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
	return is_numeric($postalcode) && strlen($postalcode) <= 5;
}

function checkPhone($phone){
	return preg_match ( " #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# " , $phone);
}
?>