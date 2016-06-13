<?php

/////////////////////////
 // Database configuration //
 ////////////////////////
$host ="localhost";
$user ="root";
$pass ="root";
$dbname = "nutrition";



// server configuration

$domain_name = "http://localhost/nutrition";    // enter the domian name of your project, don't put any "/" at the end

$logo_url = "http://localhost/nutrition/img/logo.png";   // enter the logo url of your project for email sending


////////////////////////////
// SMTP Configuration
////////////////////////////

$smtp_host="smtp.gmail.com";
$smtp_user="duzahirul@gmail.com";
$smtp_pass="z1111111111";
$smtp_secure="tls";
$smtp_port="587";




///////////////////////////

$security_key ="HU*&&*UHBHGU*&&Y@#$%VGVFVGHHJBKBVFCFJHJNJBTRFERCNUHNJMUHYGGJH";   // One time only! setup security key before any signup pocess
///////////////////////



/////////////////////////
 // Database connection function //
 ////////////////////////

function dbconnect(){
	global $host, $user, $pass, $dbname;

	$conn = mysqli_connect($host,$user,$pass,$dbname);

	return $conn;
}

/////////////////////////
 // Security Key function //
 ////////////////////////
function salt_key(){
	global $security_key;

	$salt_string = sha1($security_key);

	return $salt_string;
}



// getting domain function
function get_domain(){

	global $domain_name;

	$domain= $domain_name;

	return $domain;
}

//getting logo function
function get_logo(){

	global $logo_url;

	$logo = $logo_url;

	return $logo;
}

function get_smtp_host(){

	GLOBAL $smtp_host;
	return $smtp_host;
}

function get_smtp_user(){

	GLOBAL $smtp_user;
	return $smtp_user;
}

function get_smtp_pass(){

	GLOBAL $smtp_pass;
	return $smtp_pass;
}

function get_smtp_secure(){

	GLOBAL $smtp_secure;
	return $smtp_secure;
}

function get_smtp_port(){

	GLOBAL $smtp_port;
	return $smtp_port;
}