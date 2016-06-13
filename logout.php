<?php
require_once('functions.php');

$logout = session_destroy();

if ($logout) {
	
	header('location: login.php');
}else{
	header('location: index.php');
}