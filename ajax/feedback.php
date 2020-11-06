/**
 * @version v1.2.0
 * @build 2-26-2020
 * @package nowadays - One/Multi Page Multipurpose Creative HTML5 Template
 * @author  Pavel Marhaunichy <onebelarussianguy@gmail.com>
 * @license SEE LICENSE IN http://themeforest.net/licenses
 * @website https://likeaprothemes.com
 */

<?php

if( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['formName']) && isset($_POST['formEmail']) && isset($_POST['formMessage']) ) {

	$name = $_POST['formName'];
	$mail = $_POST['formEmail'];
	$subj = $_POST['formSubject'];
	$mess = $_POST['formMessage'];
		
	if ( !preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower($mail)) ) {
		echo 'Email address is invalid';
		return;
	}

	$to = 'onebelarussianguy@gmail.com';
	$subject = ($subj) ? $subj : 'Message from ' . $_SERVER['HTTP_HOST'];
	$message = $mess . "\r\n" . $name;
	$headers = 'From: <' . $mail . '>' . "\r\n";

	$result = mail( $to, $subject, $message, $headers );
	echo $result;
}

?>
