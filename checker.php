<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

<<<<<<< HEAD

require_once('class/BinChecker.php');

if ($_POST) {

	$card_no	= (int) $_POST['card_no'];	// Credit Card number

=======
require_once('class/BinChecker.php');

if ($_POST) {
	// Credit Card number
	$card_no	= (int) $_POST['card_no'];	
>>>>>>> e1434bda879ac0544d6a7671bd134c565b3711e0
	//Empty error to store errors
	$error= array();

	foreach ($_POST as $key => $value) {
		// Check if any input value was not entered
		// Store error for the input
		if ($_POST[$key] == '') {
			$error['error']= "Please enter the ".ucfirst(str_replace('_',' ',$key));
		}
		else {
			//Store input value
			$_SESSION[$key]= $value;
		}
	}

<<<<<<< HEAD

=======
>>>>>>> e1434bda879ac0544d6a7671bd134c565b3711e0
	// If any error was thrown
	if (count($error) > 0) {
		// Save error to session
		// Redirect to input page
		$_SESSION['msg']= $error;
		header('Location: index.php');
	}
	else {
		$checker= new BinChecker();
		// Check if card details can be fetched
		if ($checker->checkCard(substr($card_no, 0,6))) {
			$_SESSION['msg']= ['success'=>$checker->message];
			header('Location: index.php');
		}
		else {
			$_SESSION['msg']= ['error'=>$checker->message];
			header('Location: index.php');
		}
<<<<<<< HEAD
		
	}


=======
	}
>>>>>>> e1434bda879ac0544d6a7671bd134c565b3711e0
}
else {
	$_SESSION['msg']= ['error'=>"Please try again!"];
	header('Location: index.php');
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> e1434bda879ac0544d6a7671bd134c565b3711e0
