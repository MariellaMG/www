<?php

if (isset($_POST['submit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$Organization = $_POST['Organization'];
	$City = $_POST['City'];
	$State = $_POST['State'];
	$Phone = $_POST['Phone'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	
	$mailTo = "mariela@tinkeringdesigns.com";
	$headers = "From: ".$email;
	$txt = "You have received an email from ".$firstname. ".\n\n".$message;
		
	
	
	mail($mailTo, $subject, $txt, $headers);
	header("Location: response.html?mailsend");
	
	
}