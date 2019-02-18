<?php
require_once('../DAO/employeeDAO.php');
$bdd = connectBDD();

getSocialProfessionalGroup($bdd);
getEmploymentContract($bdd);
?>