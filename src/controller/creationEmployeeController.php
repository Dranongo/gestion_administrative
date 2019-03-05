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
		if(count($_POST["LastNameChild"]) != 0 && count($_POST["FirstNameChild"]) != 0 && count($_POST["BirthdateChild"]) != 0){
			$lastNameChild = $_POST["LastNameChild"];
			$firstNameChild = $_POST["FirstNameChild"];
			$birthdateChild = $_POST["BirthdateChild"];
	
			if (count($lastNameChild) == count($firstNameChild) && count($lastNameChild) == count($birthdateChild)) {
				$count = count($lastNameChild);
				for ($i = 0; $i < $count; $i++) {
					if (trim($lastNameChild[$i]) == "" || trim($firstNameChild[$i]) == "" || !checkFormatDate($birthdateChild[$i])) {
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

	if (count($_POST["LastNameContact"]) != 0 && count($_POST["FirstNameContact"]) != 0 && count($_POST["RelationshipContact"]) != 0 && count($_POST["PhoneNumberContact"]) != 0){
		$lastNameContact = $_POST["LastNameContact"];
		$firstNameContact = $_POST["FirstNameContact"];
		$relationshipContact = $_POST["RelationshipContact"];
		$phoneNumberContact = $_POST["PhoneNumberContact"];
	
		if (count($lastNameContact) == count($firstNameContact) && count($lastNameContact) == count($relationshipContact) && count($lastNameContact) == count($phoneNumberContact)) {
			$count = count($lastNameContact);
			for ($i = 0; $i < $count; $i++) {
				if (trim($lastNameContact[$i]) == "" || trim($firstNameContact[$i]) == "" || trim($relationshipContact[$i]) == "" || !checkPhone($phoneNumberContact[$i])) {
					$formValidated = false;
					echo 'la ligne contact est incorrect <br>';
				}
			}
		}else {
			$formValidated = false;
		}
	}
	else {
		$formValidated = false;
	}
	if( isset($_POST["Course"]) && isset($_POST["CourseListLevel"]) && isset($_POST["CourseInstitution"]) && isset($_POST["CoursePlace"]) && isset($_POST["CourseBeginning"]) && isset($_POST["CourseEnding"]) && isset($_POST["Graduate"])){
		if (count($_POST["Course"]) != 0 && count($_POST["CourseListLevel"]) != 0 && count($_POST["CourseInstitution"]) != 0 && count($_POST["CoursePlace"]) != 0 && count($_POST["CourseBeginning"]) != 0 && count($_POST["CourseEnding"]) != 0 && count($_POST["Graduate"]) != 0){
			$course = $_POST["Course"];
			$courseListLevel = $_POST["CourseListLevel"];
			$courseInstitution = $_POST["CourseInstitution"];
			$coursePlace = $_POST["CoursePlace"];
			$courseBeginning = $_POST["CourseBeginning"];
			$courseEnding = $_POST["CourseEnding"];
			$graduate = $_POST["Graduate"];
		
			if (count($course) == count($courseListLevel) && count($course) == count($courseInstitution) && count($course) == count($coursePlace) && count($course) == count($courseBeginning) && count($course) == count($courseEnding) && count($course) == count($graduate)) {
				$count = count($course);
				for ($i = 0; $i < $count; $i++) {
					if (trim($course[$i]) == "" || trim($courseListLevel[$i]) == "" || trim($courseInstitution[$i]) == "" || trim($coursePlace[$i]) == "" || !checkFormatDate($courseBeginning[$i]) || !checkFormatDate($courseEnding[$i])) {
						$formValidated = false;
						echo 'la ligne formation est incorrect <br>';
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

	/*if(isset($_FILES["FilesAttachment"])){
		$dossier = "../../public/pieces_jointes/";
		$files = $_FILES["FilesAttachment"];

		$count = count($file);
		for($i = 0; $i <$count; $i++){
			$tmp_file = $_FILES["FileAttachment"]["tmp_name"];

			$name_file = $_FILES["FileAttachment"]["name"];

			if(move_uploaded_file($tmp_file, $dossier . $name_file)){
				echo'fonctionne';
			}
			else {
				echo'marche pas';
			}
		}
	} else {
		echo'pas de fichier';
	}*/

	/*if(isset($_FILES["FileAttachment"])){
		//$dir = "../../public/pieces_jointes/";
		//$tmp_file = $_FILES["FileAttachment"]["tmp_name"];

		$dataFile = pathinfo($_FILES["FileAttachment"]["name"]);
		$type_file = $dataFile['extension'];
		$code_type_file = getUniqueCode("type_document", $type);

		$name_file = $code_type_file. '_' .time(). '.' .$type_file; 

		if(move_uploaded_file($tmp_file, $dir . $name_file)){
			echo'fonctionne';
		}
		else {
			echo'marche pas';
		}
	} else {
		echo'pas de fichier';
	}*/

	/*if( isset($_POST["FileAttachment"]) && isset($_POST["ListAttachment"])){
		if (count($_POST["FileAttachment"]) != 0 && count($_POST["ListAttachment"]) != 0 ){
			$fileAttachment = $_POST["FileAttachment"];
			$listAttachment = $_POST["ListAttachment"];
		
			if (count($fileAttachment) == count($listAttachment)){
				$count = count($fileAttachment);
				for ($i = 0; $i < $count; $i++) {
					if (trim($fileAttachment[$i]) == "" || trim($listAttachment[$i]) == "") {
						$formValidated = false;
						echo 'la ligne pièce jointe est incorrect <br>';
					}
				}
			}else {
				$formValidated = false;
			}
		}
		else {
			$formValidated = false;
		}
	}*/

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